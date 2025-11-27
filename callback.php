<?php
session_start();
require 'vendor/autoload.php';

// Lendo variáveis da Render
$client_id     = getenv('DISCORD_CLIENT_ID');
$client_secret = getenv('DISCORD_CLIENT_SECRET');
$redirect_uri  = getenv('DISCORD_REDIRECT_URI');

if (!isset($_GET['code'])) {
    die("Authorization code missing.");
}

$code = $_GET['code'];

// Trocar o CODE pelo TOKEN do Discord
$token_url = "https://discord.com/api/oauth2/token";

$data = [
    "client_id" => $client_id,
    "client_secret" => $client_secret,
    "grant_type" => "authorization_code",
    "code" => $code,
    "redirect_uri" => $redirect_uri,
];

$headers = [
    "Content-Type: application/x-www-form-urlencoded"
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $token_url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($data),
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true,
]);

$response = curl_exec($curl);
curl_close($curl);

$token_data = json_decode($response, true);

// Se der erro na troca de token
if (!isset($token_data["access_token"])) {
    die("Error obtaining access token: " . $response);
}

// Pegar dados do usuário (endpoint /users/@me)
$user_url = "https://discord.com/api/users/@me";
$auth_header = ["Authorization: Bearer " . $token_data["access_token"]];

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $user_url,
    CURLOPT_HTTPHEADER => $auth_header,
    CURLOPT_RETURNTRANSFER => true
]);

$user_response = curl_exec($curl);
curl_close($curl);

$user = json_decode($user_response, true);

// Salvar usuário na sessão
$_SESSION['user'] = $user;

// Redirecionar para dashboard
header("Location: /index.php");
exit;
