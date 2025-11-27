<?php
session_start();
require 'vendor/autoload.php';

// ENV
$client_id = getenv('DISCORD_CLIENT_ID');
$redirect_uri = getenv('DISCORD_REDIRECT_URI');

// Segurança: caso falte variável, evita erro silencioso
if (!$client_id || !$redirect_uri) {
    die("Missing environment variables: DISCORD_CLIENT_ID or DISCORD_REDIRECT_URI");
}

// Se já estiver logado, opcional: redirecionar para dashboard
if (isset($_SESSION['user'])) {
    header("Location: /public/r/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Discord</title>
    <link rel="stylesheet" href="/public/assets/css/sstyle.css">
</head>
<body>
    <div class="login-container">

        <h1>Login With Discord</h1>

        <a class="login-btn"
            href="https://discord.com/api/oauth2/authorize?client_id=<?= htmlspecialchars($client_id) ?>&redirect_uri=<?= urlencode($redirect_uri) ?>&response_type=code&scope=identify">
            Login with Discord
        </a>

    </div>
</body>
</html>
