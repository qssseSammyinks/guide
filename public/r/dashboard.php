<?php
// Tempo de espera em segundos
$waitTime = 5;

// Página de destino
$destination = "../dashboard/index.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <link rel="stylesheet" href="/public/assets/css/stylers.css">
    <meta http-equiv="refresh" content="<?php echo $waitTime; ?>;url=<?php echo $destination; ?>">
</head>
<body>
    <div class="redirect-container">
        <h1>Loading the system...</h1>
        <div class="loader"></div>
    </div>
</body>
</html>
