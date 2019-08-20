<?php
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

$login = $_POST['login'];
$password = $_POST['password'];

function checkLogin($users)
{
    global $login;
    global $password;

    if (array_key_exists($login, $users)) {
        if ($users[$login] == $password) {
            echo 'Вы успешно вошли в систему!';
            return true;
        } else {
            echo 'Неверно введен пароль!';
            return false;
        }
    }
    echo 'Неверно введен логин!';
return false;
}

function check() {
    global $users;

    if (checkLogin($users) === true) {
        exit;
    } else {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['time'] = time();
        $_SESSION['counter'] = 1;
        return;
    }
}

function file() {
    $file = $_POST['login'].'.txt';
    $userFile = fopen($file, 'a+');
    $date = date('d.m.Y H:i:s') . "\n";
    fwrite($userFile, $date);
    fclose($userFile);
}

function checkBruteForce()
    session_start();

    if (count($_SESSION) == 0) {
        check();
        return;
    }

    if ($_SESSION['login'] === $_POST['login']) {

        $_SESSION['counter']++;

        if (((time() - $_SESSION['time']) <= 5) && ($_SESSION['counter'] === 2)) {
            echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
            file();
            exit;
        } elseif ((time() - $_SESSION['time']) < 60) {
            $_SESSION['counter']++;
            if ($_SESSION['counter'] >= 3) {
                $_SESSION['counter'] = 0;
                echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
                file();
                exit;
            }
        } elseif ((time() - $_SESSION['time']) > 60) {
            $_SESSION = [];
            check();
            return;
        }
    } else {
        check();
        return;
    }
}

checkBruteForce();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <style type="text/css">
    input {
    display: block;
    margin-top: 10px;
	}
	button {
    margin-top: 10px;
	}
  </style>
</head>
<body>
<form action="index.php" method="post">
  <input type="text" name="login" placeholder="Логин" required>
  <input type="password" name="password" placeholder="Пароль" required>
  <button type="submit">Отправить</button>
</form>
</body>
</html>