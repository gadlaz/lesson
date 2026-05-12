<?php
$name = $_GET['name'] ?? 'Гость'; 
$age  = $_GET['age']  ?? null;

if ($age === null) {
    echo "Добавьте возраст в URL: ?age=20<br>";
    exit; 
}

echo "Привет, $name!<br>";


$isAdult = $age >= 18; 

if ($isAdult) {
    echo "Вы совершеннолетний.";
} else {
    echo "Вы несовершеннолетний.";
}

?>