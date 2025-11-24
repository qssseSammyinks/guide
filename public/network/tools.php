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
    <title>Admin Tools - Discord</title>
    <link rel="stylesheet" href="/public/assets/css/tools.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="<?= $theme ?>">
    <div class="container">
        <header>
            <h1>Admin Tools</h1>
            <div class="header-right">
                <div class="theme-buttons">
                    <a href="?theme=light" class="btn">Light <i class="fa-solid fa-sun"></i></a>
                    <a href="?theme=dark" class="btn">Dark <i class="fa-solid fa-moon"></i></a>
                </div>
                <a href="../dashboard/index.html" class="btn back"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
            </div>
        </header>

        <main>
            <section class="tools-section">
                <h2>Admin Commands</h2>
                <div class="tool-buttons">
                    <a href="kick_user.php" class="btn tool-btn" data-tooltip="Remove a user from the server"><i class="fa-solid fa-user-slash"></i> Kick User</a>
                    <a href="ban_user.php" class="btn tool-btn" data-tooltip="Ban a user permanently"><i class="fa-solid fa-ban"></i> Ban User</a>
                    <a href="mute_user.php" class="btn tool-btn" data-tooltip="Mute a user temporarily"><i class="fa-solid fa-volume-xmark"></i> Mute User</a>
                    <a href="unmute_user.php" class="btn tool-btn" data-tooltip="Unmute a user"><i class="fa-solid fa-volume-high"></i> Unmute User</a>
                    <a href="warn_user.php" class="btn tool-btn" data-tooltip="Send a warning to a user"><i class="fa-solid fa-triangle-exclamation"></i> Warn User</a>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Tooltip functionality
        const buttons = document.querySelectorAll('.tool-btn');
        buttons.forEach(btn => {
            const tooltipText = btn.getAttribute('data-tooltip');
            const tooltip = document.createElement('span');
            tooltip.className = 'tooltip';
            tooltip.innerText = tooltipText;
            btn.appendChild(tooltip);
        });
    </script>
</body>
</html>
