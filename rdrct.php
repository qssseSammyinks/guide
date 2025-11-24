<?php
$waitTime = 5;
$destination = "public/dashboard/index.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>

    <meta http-equiv="refresh" content="<?= $waitTime ?>;url=<?= $destination ?>">

    <link rel="stylesheet" href="public/assets/css/styler.css">
</head>
<body>

<div class="box">
    <div class="loader"></div>

    <h2>Redirecting in <span id="count"><?= $waitTime ?></span> seconds</h2>
    <p>Please wait…</p>
</div>

<script>
let t = <?= $waitTime ?>;
const el = document.getElementById("count");

setInterval(() => {
    t--;
    if (t >= 0) el.textContent = t;
}, 1000);
</script>

</body>
</html>
