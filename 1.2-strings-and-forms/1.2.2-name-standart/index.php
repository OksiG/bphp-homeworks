<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];

$fullName = ucfirst($firstName).''.ucfirst($lastName).''.ucfirst($middleName);
$fio = mb_substr($firstName,1).mb_substr($lastName,1).mb_substr($middleName,1);
$surnameAndInitials = ucfirst($firstName).''.mb_substr($lastName,1).'.'.mb_substr($middleName,1).'.';

echo "Полное имя: $fullName";
echo "Фамилия и инициалы: $surnameAndInitials";
echo "Аббревиатура: $fio";

