<?php
$text = 'Hello, world!';
$image = 'img/1.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.0</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="img" style="background-image: url(<?php echo $image; ?>)">
    <div class="greeting">
        <h1><?php echo $text; ?></h1>
    </div>
</div>
</body>
</html>