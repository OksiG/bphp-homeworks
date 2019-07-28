<?php

$hour = date("H");
$dayWeekend = date("N");


switch ($dayWeekend) :
    case 1: $dayWeekend = "понедельник"; break;
    case 2: $dayWeekend = "вторник"; break;
    case 3: $dayWeekend = "среда"; break;
    case 4: $dayWeekend = "четверг"; break;
    case 5: $dayWeekend = "пятница"; break;
    case 6: $dayWeekend = "суббота"; break;
    case 7: $dayWeekend = "воскресенье"; break;

    endswitch;

if ($hour >= 6 && $hour < 11) {
    $image = "img/goodmorning.jpg";
    $text = "Доброе утро! Сегодня $dayWeekend.";
} elseif ($hour >= 10 && $hour < 18) {
    $image = "img/goodday.jpg";
    $text = "Добрый день! Сегодня $dayWeekend.";
} elseif ($hour >= 18 && $hour < 23) {
    $image = "img/goodevening.jpg";
    $text = "Добрый вечер! Сегодня $dayWeekend.";
} else {
    $image = "img/goodnight.jpg";
    $text = "Доброй ночи! Сегодня $dayWeekend.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- подключение стилевого файла -->
</head>
<body>
<!-- Ваша html-вёрстка, частично задаваемая с помощью PHP -->
    <div class="img" style="background-image: url(<?php echo $image; ?>)">
        <div class="greeting">
            <h1><?php echo $text; ?></h1>
        </div>
    </div>
</body>
</html>