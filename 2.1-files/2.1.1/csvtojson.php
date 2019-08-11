<?php
if (($handle = fopen("data.csv", "r")) !== FALSE) {
    $data = fgetcsv($handle, 1000, ";");
    $name = $data[0];
    $art = $data[1];
    $price = $data[2];
    $json = [];
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $json[] = [
            $name => $data[0],
            $art => $data[1],
            $price => $data[2],
        ];
        }
    }

    fclose($handle);

    $current = json_encode($json);

    file_put_contents('data.json', $current);



