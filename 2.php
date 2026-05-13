<?php
$errors = [];
$userData = [];

if (!empty($_POST)) {
    $name  = $_POST['name']  ?? '';
    $email = $_POST['email'] ?? '';
    $pass  = $_POST['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Некорректный формат email';
    }

    if (trim($name) === '') {
        $errors[] = 'Имя не может быть пустым';
    }
    if ($pass === '') {
        $errors[] = 'Пароль обязателен';
    }

    if (empty($errors)) {
        $userData = [
            'name'     => trim($name),
            'email'    => $email,
            'password' => $pass 
        ];

        echo '<h3>✅ Регистрация прошла успешно!</h3>';
        echo '<p>Данные в виде ассоциативного массива:</p>';
        
        echo '<pre>';
        var_dump($userData);
        echo '</pre>';
        
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <style>body { font-family: sans-serif; padding: 20px; }</style>
</head>
<body>
    <h2>Форма регистрации</h2>
    <?php if (!empty($errors)): ?>
        <div style="color: red; background: #ffe6e6; padding: 10px; border-radius: 4px;">
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?= htmlspecialchars($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label>Имя:<br>
            <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
        </label><br><br>

        <label>Email:<br>
            <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </label><br><br>

        <label>Пароль:<br>
            <input type="password" name="password" required>
        </label><br><br>

        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>