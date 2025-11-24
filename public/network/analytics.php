<?php
session_start();

// Theme toggle (Light/Dark)
if(isset($_GET['theme'])) {
    $_SESSION['theme'] = $_GET['theme'];
}

// Default theme
$theme = $_SESSION['theme'] ?? 'light';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics — Maintenance</title>
    <link rel="stylesheet" href="/public/assets/css/analystic.css">
</head>
<body class="<?= $theme ?>">

    <header>
        <h1>Analytics</h1>
        <div class="buttons">
            <a href="../dashboard/index.php" class="btn">Back to Dashboard</a>
            <?php if($theme === 'light'): ?>
                <a href="?theme=dark" class="btn">Dark Mode</a>
            <?php else: ?>
                <a href="?theme=light" class="btn">Light Mode</a>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <section class="maintenance">
            <h2>Maintenance Mode</h2>
            <p>The Analytics system is currently under maintenance.</p>
            <p>It is not available for use at this time and may not be updated in the future.</p>
            <p>Please check back later or contact the team on Discord for further guidance.</p>
        </section>
    </main>

</body>
</html>
