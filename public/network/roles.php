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
    <title>Discord Roles — Team Info</title>
    <link rel="stylesheet" href="/public/assets/css/roles.css">
</head>
<body class="<?php echo $theme; ?>">

<div class="container">
    <div class="header">
        <h1>Discord Roles — Team Info</h1>
        <div class="buttons">
            <a href="../dashboard/index.html" class="btn">Back to Dashboard</a>
            <a href="?theme=light" class="btn">Light</a>
            <a href="?theme=dark" class="btn">Dark</a>
        </div>
    </div>

    <div class="roles">
        <div class="role-card">
            <h2>Owner</h2>
            <p>Sammyinkr — Owner</p>
            <p><strong>Info:</strong> Has full control over the server, final decisions, and ensures all rules and vision are followed.</p>
        </div>
        <div class="role-card">
            <h2>Sub Owner</h2>
            <p>No members</p>
            <p><strong>Info:</strong> Assists the Owner, can manage most administrative tasks and fill in during absence of Owner.</p>
        </div>
        <div class="role-card">
            <h2>Executive Team</h2>
            <p>Noah — Executive</p>
            <p><strong>Info:</strong> Oversees departments, manages high-level decisions, and coordinates managers.</p>
        </div>
        <div class="role-card">
            <h2>Manager Team</h2>
            <p>No members</p>
            <p><strong>Info:</strong> Manages teams, ensures workflows are efficient, and reports to executives.</p>
        </div>
        <div class="role-card">
            <h2>Admin Team</h2>
            <p>No members</p>
            <p><strong>Info:</strong> Maintains server settings, resolves technical issues, and supports staff operations.</p>
        </div>
        <div class="role-card">
            <h2>Dev Team</h2>
            <p>No members</p>
            <p><strong>Info:</strong> Develops bots, features, or server tools to improve functionality and automation.</p>
        </div>
        <div class="role-card">
            <h2>Mod Team</h2>
            <p>No members</p>
            <p><strong>Info:</strong> Monitors chats, enforces rules, and handles disputes between members.</p>
        </div>
        <div class="role-card">
            <h2>Helper Team</h2>
            <p>Aj — Helper</p>
            <p><strong>Info:</strong> Assists members with questions, provides guidance, and supports moderation team.</p>
        </div>
        <div class="role-card">
            <h2>Tester Team</h2>
            <p>No members</p>
            <p><strong>Info:</strong> Tests new bots, features, and updates before release to ensure stability.</p>
        </div>
        <div class="role-card">
            <h2>Staff Team</h2>
            <p>No members</p>
            <p><strong>Info:</strong> General staff assisting in various roles as needed for server operations.</p>
        </div>
    </div>
</div>

</body>
</html>
