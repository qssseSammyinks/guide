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
    <title>Discord Permissions — Team Info</title>
    <link rel="stylesheet" href="/public/assets/css/permissions.css">
</head>
<body class="<?php echo $theme; ?>">

<div class="container">
    <div class="header">
        <h1>Discord Permissions — Team Info</h1>
        <div class="buttons">
            <a href="../dashboard/index.html" class="btn">Back to Dashboard</a>
            <a href="?theme=light" class="btn">Light</a>
            <a href="?theme=dark" class="btn">Dark</a>
        </div>
    </div>

    <div class="permissions">
        <div class="perm-card owner">
            <h2>Owner ⭐</h2>
            <ul>
                <li>Full server control</li>
                <li>Manage roles & channels</li>
                <li>Approve changes & updates</li>
                <li>Full moderation powers</li>
            </ul>
        </div>

        <div class="perm-card executive">
            <h2>Executive Team 🏆</h2>
            <ul>
                <li>Manage Managers</li>
                <li>High-level decisions</li>
                <li>View server analytics</li>
            </ul>
        </div>

        <div class="perm-card manager">
            <h2>Manager Team 👔</h2>
            <ul>
                <li>Manage staff & roles</li>
                <li>Coordinate projects</li>
                <li>Access to private channels</li>
            </ul>
        </div>

        <div class="perm-card admin">
            <h2>Admin Team 🛠️</h2>
            <ul>
                <li>Server settings access</li>
                <li>Manage bots & integrations</li>
                <li>Moderation support</li>
            </ul>
        </div>

        <div class="perm-card dev">
            <h2>Dev Team 💻</h2>
            <ul>
                <li>Create bots & scripts</li>
                <li>Manage automation tools</li>
                <li>Test new features</li>
            </ul>
        </div>

        <div class="perm-card mod">
            <h2>Mod Team 🛡️</h2>
            <ul>
                <li>Moderate chats</li>
                <li>Warn/Kick/Ban members</li>
                <li>Enforce rules</li>
            </ul>
        </div>

        <div class="perm-card helper">
            <h2>Helper Team 💡</h2>
            <ul>
                <li>Assist new members</li>
                <li>Answer questions</li>
                <li>Support moderation team</li>
            </ul>
        </div>

        <div class="perm-card tester">
            <h2>Tester Team 🧪</h2>
            <ul>
                <li>Test bots & features</li>
                <li>Report bugs</li>
                <li>Verify stability before release</li>
            </ul>
        </div>

        <div class="perm-card staff">
            <h2>Staff Team 🧑‍💼</h2>
            <ul>
                <li>Assist in general operations</li>
                <li>Support multiple teams</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
