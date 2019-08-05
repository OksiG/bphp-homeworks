<?php

function generate($rows, $places, $chairs) {
    if ($rows * $places > $chairs) {
        return false;
    }

    $map = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $places; $j++) {
            $map[$i][$j] = false;
        }
    }
    return $map;
}

function tryReserve ($map, $requiredPlaces) {
    for ($i = 0; $i < count($map); $i++) {

        for ($j = 0; $j < count($map[$i]); $j++) {
            if (($j + $requiredPlaces) > (count($map[$i]))) {
                return false;
            }

            if ($map[$i][$j] === false) {
                $requiredPlaces--;
                if ($requiredPlaces === 0) {
                    return 'Найдены лучшие места: c '.($j-$requiredPlaces+2).' по '.($j+1).' в ряду '.($i+1);
                }
            }
        }
    }
    return 'Подходящих мест не найдено';
}

$chairs = 50;
$map = generate(5, 8, $chairs);
$map[1][7] = true;
$map[4][2] = true;
$requiredPlaces = 3;

echo tryReserve($map, $requiredPlaces);
?>