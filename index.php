<?php
session_start();
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client_id = $_ENV['DISCORD_CLIENT_ID'];
$redirect_uri = $_ENV['DISCORD_REDIRECT_URI'];
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
        <?php if(isset($_SESSION['user'])): ?>
            <div class="welcome">Hello, <?= $_SESSION['user']['username'] ?>!</div>
            <a class="login-btn" href="logout.php">Logout</a>
        <?php else: ?>
            <h1>Login with Discord</h1>
            <a class="login-btn" href="https://discord.com/api/oauth2/authorize?client_id=<?= $client_id ?>&redirect_uri=<?= urlencode($redirect_uri) ?>&response_type=code&scope=identify">Login with Discord</a>
        <?php endif; ?>
    </div>
</body>
</html>
