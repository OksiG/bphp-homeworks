<?php

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$codeWord = $_POST['code'];

$isCorrect = true;
$codeWordUser = "nd82jaake";

if (preg_match('/[^!@#$%^&*()?,;:./]/', $login)) {
    echo "Поле логин не должно содержать спец.символы !@#$%^&*()?,;:./";
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

if (trim($firstName) && strlen($firstName) === 0) {
    echo "Заполните Имя. Поле с именем не может быть пустым";
    $isCorrect = false;
}

if (trim($lastName) && strlen($lastName) === 0) {
    echo "Заполните Фамилию. Поле с фамилией не может быть пустым";
    $isCorrect = false;
}

if (trim($middleName) && strlen($middleName) === 0) {
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
