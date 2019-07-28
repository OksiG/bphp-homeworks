<?php
$variable = 1;

if (is_bool($variable)) {
    echo "$variable is bool";
} elseif (is_float($variable)) {
    echo "$variable is float";
} elseif (is_int($variable)) {
    echo "$variable is int";
} elseif (is_string($variable)) {
    echo "$variable is string";
} elseif (is_null($variable)) {
    echo "$variable is null";
} else {
    echo "$variable is other";
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?=$type?></p>
</body>
</html>

