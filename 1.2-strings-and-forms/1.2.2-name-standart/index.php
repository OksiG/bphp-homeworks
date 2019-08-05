<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];

$isCorrect = true;

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

if ($isCorrect) {
    $fullName = ucfirst($lastName).' '.ucfirst($firstName).' '.ucfirst($middleName);
    $fio = mb_substr($lastName,0,1).mb_substr($firstName,0,1).mb_substr($middleName,0,1);
    $surnameAndInitials = ucfirst($lastName).' '.mb_substr($firstName,0,1).'.'.mb_substr($middleName,0,1).'.';

    echo "Полное имя: $fullName";
    echo "Фамилия и инициалы: $surnameAndInitials";
    echo "Аббревиатура: $fio";
}