<?php

$csv = array_map('str_getcsv', file('data.csv'));
$json = [];

$name = $csv[0][0];
$art = $csv[0][1];
$price = $csv[0][2];

for ($i = 1; $i < count($csv); $i++ ) {
    for ($j = 0; $j < count($csv[$i]); $j++) {
        global $json;
        foreach ($json[$i-1] as $k => $v) {
            $v = $csv[$i][$j];
        }
    }
}

$current = json_encode($json);

file_put_contents('data.json', $current);

?>