<?php
// Sempre iniciar sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* ================================
   1. VERIFICAR SE ESTÁ LOGADO
================================ */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

/* ================================
   2. VERIFICAR SE É STAFF
   (com base no que salvamos no callback)
================================ */
if (!isset($_SESSION['user']['is_staff']) || $_SESSION['user']['is_staff'] !== true) {
    die("Acesso negado. Você não possui permissão.");
}

/* ================================
   3. (OPCIONAL)
   Segurança extra: expirar sessão após X minutos
================================ */
$session_lifetime = 3600; // 1 hora

if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
} elseif (time() - $_SESSION['last_activity'] > $session_lifetime) {
    session_unset();
    session_destroy();
    die("Sessão expirada. Faça login novamente.");
}

$_SESSION['last_activity'] = time();

/* ================================
   Pronto: acesso liberado
================================ */
