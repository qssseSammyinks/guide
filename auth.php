<?php
session_start();

$SESSION_DURATION = 1800; // 30 min
$SESSION_REGEN = 600;     // Regenerar ID a cada 10 min

// Não logado → login
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header("Location: /login.php");
    exit;
}

// Proteção por IP
if ($_SESSION['IP'] !== $_SERVER['REMOTE_ADDR']) {
    session_destroy();
    die("Sessão inválida (IP mudou)");
}

// Proteção por navegador
if ($_SESSION['UA'] !== $_SERVER['HTTP_USER_AGENT']) {
    session_destroy();
    die("Sessão inválida (Navegador mudou)");
}

// Expiração por inatividade
if (time() - $_SESSION['LAST_ACTIVITY'] > $SESSION_DURATION) {
    session_destroy();
    die("Sessão expirada, faça login novamente.");
} else {
    $_SESSION['LAST_ACTIVITY'] = time();
}

// Regenerar session ID para evitar hijack
if (time() - $_SESSION['SESSION_CREATED'] > $SESSION_REGEN) {
    session_regenerate_id(true);
    $_SESSION['SESSION_CREATED'] = time();
}
