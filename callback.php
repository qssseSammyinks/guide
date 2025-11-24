<?php
session_start();
require 'vendor/autoload.php';
use GuzzleHttp\Client as HttpClient;
use MongoDB\Client as MongoClient;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client_id = $_ENV['DISCORD_CLIENT_ID'];
$client_secret = $_ENV['DISCORD_CLIENT_SECRET'];
$redirect_uri = $_ENV['DISCORD_REDIRECT_URI'];
$bot_token = $_ENV['BOT_TOKEN'];
$guild_id = $_ENV['GUILD_ID'];
$staff_role_id = $_ENV['STAFF_ROLE_ID'];

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
$mongo = new MongoClient($_ENV['MONGO_URI']);
$collection = $mongo->selectDatabase($_ENV['MONGO_DB'])->selectCollection($_ENV['MONGO_COLLECTION']);
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
