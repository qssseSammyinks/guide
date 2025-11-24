<?php
session_start();

// Theme toggle
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
    <title>User Panel - Discord Guides</title>
    <link rel="stylesheet" href="/public/assets/css/user.css">
</head>
<body class="<?= $theme; ?>">

    <div class="container">
        <h1>User Panel</h1>
        <p class="maintenance">⚠️ This section is under maintenance. Please wait until it is ready for use.</p>
        
        <div class="buttons">
            <a href="/public/dashboard/index.html" class="btn">Back to Dashboard</a>
            <a href="?theme=light" class="btn theme-btn">Light Mode</a>
            <a href="?theme=dark" class="btn theme-btn">Dark Mode</a>
        </div>
    </div>

</body>
</html>
