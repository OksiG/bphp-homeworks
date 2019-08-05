<?php

function generate($rows, $placesPerRow, $chairs){
    if ($rows * $placesPerRow > $chairs) {
        return false;
    }

    $map = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $placesPerRow; $j++) {
            $map[$i][$j] = false;
        }
    }
    return $map;
}

function reserve($map, $requiredRow, $requiredPlace){
    if ($map[$requiredRow-1][$requiredPlace-1] === false) {
        global $map;
        $map[$requiredRow-1][$requiredPlace-1] = true;
        return true;
    } else {
        return false;
    }
}

$chairs = 50;
$map = generate(5, 8, $chairs);
$requiredRow = 3;
$requiredPlace = 5;

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);


function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
    }
}