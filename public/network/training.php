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
    <title>Training - Tools</title>
    <link rel="stylesheet" href="/public/assets/css/training.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="<?php echo $theme; ?>">

    <header>
        <h1>Training - Tools</h1>
        <div class="theme-toggle">
            <a href="?theme=light" class="btn-theme"><i class="fa-solid fa-sun"></i> Light</a>
            <a href="?theme=dark" class="btn-theme"><i class="fa-solid fa-moon"></i> Dark</a>
        </div>
    </header>

    <main>
        <section class="tools">
            <h2>Team Tools for Discord</h2>
            <p>Welcome to the team training area. Use the tools below to manage and assist your Discord server effectively.</p>
            
            <div class="tool-list">
                <a href="guide1.php" class="tool-btn"><i class="fa-solid fa-book"></i> Guide 1</a>
                <a href="guides.php" class="tool-btn"><i class="fa-solid fa-book"></i> Guide</a>
                <a href="tools.php" class="tool-btn"><i class="fa-solid fa-book"></i> Tools </a>
            </div>
        </section>

        <a href="../dashboard/index.html" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </main>

</body>
</html>
