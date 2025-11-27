<?php
session_start();
require 'vendor/autoload.php';

use GuzzleHttp\Client as HttpClient;
use MongoDB\Client as MongoClient;

// Configurações de ambiente
$client_id = getenv('DISCORD_CLIENT_ID');
$client_secret = getenv('DISCORD_CLIENT_SECRET');
$redirect_uri = getenv('DISCORD_REDIRECT_URI');
$bot_token = getenv('BOT_TOKEN');
$guild_id = getenv('GUILD_ID');
$staff_role_id = getenv('STAFF_ROLE_ID');
$mongo_uri = getenv('MONGO_URI');
$mongo_db = getenv('MONGO_DB');
$mongo_collection = getenv('MONGO_COLLECTION');

// Sem code, não entra
if (!isset($_GET['code'])) die('No code provided');

$code = $_GET['code'];
$http = new HttpClient();

// Troca CODE por TOKEN
$token_res = $http->post('https://discord.com/api/oauth2/token', [
    'form_params' => [
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirect_uri,
        'scope' => 'identify guilds.members.read'
    ]
]);
$tokenData = json_decode($token_res->getBody(), true);
$access_token = $tokenData['access_token'];

// Dados do usuário
$user_res = $http->get('https://discord.com/api/users/@me', [
    'headers' => ['Authorization' => "Bearer $access_token"]
]);
$user = json_decode($user_res->getBody(), true);

// Dados do membro no servidor (Via Bot Token)
$member_res = $http->get("https://discord.com/api/guilds/$guild_id/members/{$user['id']}", [
    'headers' => ['Authorization' => "Bot $bot_token"]
]);
$member = json_decode($member_res->getBody(), true);

// Verificar cargo
if (!isset($member['roles']) || !in_array($staff_role_id, $member['roles'])) {
    die("Acesso negado — você não é staff.");
}

// Conexão Mongo
$mongo = new MongoClient($mongo_uri);
$collection = $mongo->selectDatabase($mongo_db)->selectCollection($mongo_collection);

// Salvar / atualizar dados
$collection->updateOne(
    ['id' => $user['id']],
    [
        '$set' => [
            'username' => $user['username'],
            'avatar' => $user['avatar'] ?? null,
            'discriminator' => $user['discriminator'],
            'lastLogin' => time(),
            'roles' => $member['roles']
        ]
    ],
    ['upsert' => true]
);

// Sessão segura
$_SESSION['logged'] = true;
$_SESSION['discord_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['roles'] = $member['roles'];

// Segurança extra
$_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];         // trava IP
$_SESSION['UA'] = $_SERVER['HTTP_USER_AGENT'];     // trava navegador
$_SESSION['LAST_ACTIVITY'] = time();               // expira sessão
$_SESSION['SESSION_CREATED'] = time();             // regen automática

// Redirecionar
header("Location: /index.php");
exit;
