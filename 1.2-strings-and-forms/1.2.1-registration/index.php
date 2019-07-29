<?php

$login = $_GET['login'];
$password = $_GET['password'];
$email = $_GET['email'];
$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$middleName = $_GET['middleName'];
$codeWord = $_GET['code'];

$isCorrect = true;
$codeWordUser = "nd82jaake";

if (preg_match('/\W+/', $login)) {
    echo "Поле логин не должно содержать спец.символы @/*?,;:.";
    $isCorrect = false;
}

if (strlen($password) < 9) {
    echo "Длина пароля должна быть минимум 8 символов";
    $isCorrect = false;
}

if (preg_match('/^\w*\@\p{L}*\.\p{L}*/', $email)) {
    echo "Вы неверно указали почту";
    $isCorrect = false;
}

if (strlen($firstName) === 0) {
    echo "Заполните Имя. Поле с именем не может быть пустым";
    $isCorrect = false;
}

if (strlen($lastName) === 0) {
    echo "Заполните Фамилию. Поле с фамилией не может быть пустым";
    $isCorrect = false;
}

if (strlen($middleName) === 0) {
    echo "Заполните Отчество. Поле с отчеством не может быть пустым";
    $isCorrect = false;
}

if ($codeWordUser !== $codeWord) {
    echo "Кодовое слово указано не верно!";
    $isCorrect = false;
}

if ($isCorrect) {
    echo "Вы успешно зарегистрировались!";
}
