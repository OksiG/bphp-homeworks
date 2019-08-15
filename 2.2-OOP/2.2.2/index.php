<?php

include ('autoload.php');
include ('./config/SystemConfig.php');

$test = new Users;
$usersList = $test->newQuery()->getObjs();
print_r($usersList);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
    <style type="text/css">
        input {
            margin-top: 10px;
        }
        button {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<form action="./formActions/addUser.php" method="post">
    <input type="text" name="name" placeholder="Имя" required>
    <input type="text" name="password" placeholder="Пароль" required>
    <input type="text" name="email" placeholder="Электронная почта" required>
    <input type="text" name="rate" placeholder="Рейтинг" required>
    <button type="submit">Добавить пользователя</button>
</form>
</body>
</html>

