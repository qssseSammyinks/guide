<?php
session_start();

// Theme toggle (Light/Dark)
if (isset($_GET['theme'])) {
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
    <title>Announcements — Discord Team</title>
    <link rel="stylesheet" href="/public/assets/css/announcements.css">
</head>
<body class="<?php echo $theme; ?>">

    <header>
        <h1>Announcements</h1>
        <div class="theme-toggle">
            <a href="?theme=light" class="btn">Light Mode</a>
            <a href="?theme=dark" class="btn">Dark Mode</a>
        </div>
        <a href="../dashboard/index.html" class="btn back-btn">← Back to Dashboard</a>
    </header>

    <main>
        <div class="announcement-card">
            <h2>System Maintenance</h2>
            <p>The announcements section is currently under maintenance. Please check back later for the latest updates.</p>
        </div>

        <div class="announcement-card">
            <h2>About Our Business</h2>
            <p>We are dedicated to managing our Discord community with care. Our team ensures smooth communication, handles moderation, and maintains a welcoming environment for all members.</p>
            <ul>
                <li>Community Updates</li>
                <li>Staff Announcements</li>
                <li>Bot Notifications</li>
            </ul>
        </div>
    </main>

</body>
</html>
