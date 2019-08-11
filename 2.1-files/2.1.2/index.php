<?php
$uploaddir = './uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

print "</pre>";

if ((exif_imagetype($_FILES['userfile']['name']) == IMAGETYPE_GIF) || (exif_imagetype($_FILES['userfile']['name']) == IMAGETYPE_JPEG)  || (exif_imagetype($_FILES['userfile']['name']) == IMAGETYPE_PNG)) {
    $files = scandir($uploaddir);
} else {
    echo 'Файл не является картинкой!';
}

?>

<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="index.php" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
</form>
