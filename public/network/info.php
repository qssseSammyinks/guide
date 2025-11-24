<?php
session_start();

// Theme toggle (Light/Dark)
if (isset($_GET['theme'])) {
    $_SESSION['theme'] = $_GET['theme'];
}

// Default theme
$theme = $_SESSION['theme'] ?? 'light';

// Sample data
$totalUsers = 109;
$staffCount = 3;
$botsCount = 18;

$staffMembers = [
    "Sammyinkr — Owner",
    "Noah — Executive",
    "Aj — Helper"
];

$bots = [
    "GuideBot",
    "ModBot",
    "FunBot"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info — Discord Guides</title>
    <link rel="stylesheet" href="/public/assets/css/info.css">
</head>
<body class="<?= $theme ?>">
    <div class="container">
        <header>
            <h1>Server Info</h1>
            <div class="theme-toggle">
                <a href="?theme=light" class="btn">Light</a>
                <a href="?theme=dark" class="btn">Dark</a>
            </div>
        </header>

        <section class="stats">
            <div class="card">
                <h2>Users</h2>
                <p><?= $totalUsers ?></p>
            </div>
            <div class="card">
                <h2>Staff</h2>
                <p><?= $staffCount ?></p>
                <ul>
                    <?php foreach($staffMembers as $member): ?>
                        <li><?= $member ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="card">
                <h2>Bots</h2>
                <p><?= $botsCount ?></p>
                <ul>
                    <?php foreach($bots as $bot): ?>
                        <li><?= $bot ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <section class="useful-info">
            <h2>Useful Info</h2>
            <p>Make sure to follow the server rules and stay active in the community!</p>
        </section>

        <footer>
            <a href="/public/dashboard/index.html" class="btn back">Back to Dashboard</a>
        </footer>
    </div>
</body>
</html>
