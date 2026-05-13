<?php
session_start();
if (isset($_GET['reset'])) {
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit; 
}

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 0;
}

$_SESSION['visits']++;

if ($_SESSION['visits'] === 1) {
    $message = "👋 Добро пожаловать! Это ваш первый визит.";
} else {
    $message = "🔄 С возвращением! Вы зашли уже " . $_SESSION['visits'] . " раз(а).";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Система посещений</title>
    <style>body { font-family: system-ui, sans-serif; padding: 40px; line-height: 1.6; }</style>
</head>
<body>
    <h1><?= $message ?></h1>
    <p>Счётчик в сессии: <code>$_SESSION['visits'] = <?= $_SESSION['visits'] ?></code></p>
    
    <hr>
    <a href="?reset=1">🗑 Сбросить сессию (начать заново)</a> | 
    <a href="<?= $_SERVER['PHP_SELF'] ?>">🔄 Обновить страницу</a>
</body>
</html>