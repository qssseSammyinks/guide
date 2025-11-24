<?php
session_start();
require 'vendor/autoload.php';
use GuzzleHttp\Client as HttpClient;
use MongoDB\Client as MongoClient;

// Substituindo $_ENV por getenv()
$client_id = getenv('DISCORD_CLIENT_ID');
$client_secret = getenv('DISCORD_CLIENT_SECRET');
$redirect_uri = getenv('DISCORD_REDIRECT_URI');
$bot_token = getenv('BOT_TOKEN');
$guild_id = getenv('GUILD_ID');
$staff_role_id = getenv('STAFF_ROLE_ID');
$mongo_uri = getenv('MONGO_URI');
$mongo_db = getenv('MONGO_DB');
$mongo_collection = getenv('MONGO_COLLECTION');

if (!isset($_GET['code'])) die('No code provided');

$code = $_GET['code'];
$http = new HttpClient();

// Troca código por token
$response = $http->post('https://discord.com/api/oauth2/token', [
    'form_params' => [
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirect_uri,
        'scope' => 'identify'
    ]
]);
$token_data = json_decode($response->getBody(), true);
$access_token = $token_data['access_token'];

// Pega info do usuário
$response = $http->get('https://discord.com/api/users/@me', [
    'headers' => ['Authorization' => "Bearer $access_token"]
]);
$user = json_decode($response->getBody(), true);

// Verifica cargo do usuário via token do bot
$response = $http->get("https://discord.com/api/guilds/$guild_id/members/{$user['id']}", [
    'headers' => ['Authorization' => "Bot $bot_token"]
]);
$member = json_decode($response->getBody(), true);

// Bloqueia se não for Staff
if (!in_array($staff_role_id, $member['roles'])) {
    die("Access denied: you are not staff.");
}

// Salva no MongoDB
$mongo = new MongoClient($mongo_uri);
$collection = $mongo->selectDatabase($mongo_db)->selectCollection($mongo_collection);
$collection->updateOne(
    ['id' => $user['id']],
    ['$set' => ['username' => $user['username'], 'discriminator' => $user['discriminator']]],
    ['upsert' => true]
);

// Salva sessão
$_SESSION['user'] = $user;

// Redireciona para a dashboard
header("Location: rdrct.php");
exit;
