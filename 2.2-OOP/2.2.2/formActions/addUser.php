<?php
/*Подключение необходимых файлов*/
include ('./autoload.php');
include ('./config/SystemConfig.php');

/*Создание объекта*/
$newUser = new User;

/*Передача значений свойств из формы в объект*/
$newUser->name = $_POST['name'];
$newUser->email = $_POST['email'];
$newUser->password = $_POST['password'];
$newUser->rate = $_POST['rate'];

/*Сохранение*/
$newUser->commit();

/*Далее перенаправление на страницу, с которой производилась отправка формы:*/
header('HTTP/1.1 200 OK');
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2.2-OOP/2.2.2');