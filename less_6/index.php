<?php
require "config.php"; //  require позволяет включать файлы в PHP сценарий до выполнения сценария PHP. В данном случае подключаем файл установки связи с БД
$mod = $_GET['mod'] ? (string)htmlspecialchars(strip_tags($_GET['mod'])) : DEFAULT_MOD; //  Удаляем теги там, где они не ожидаются (если ? тогда : иначе)
//  file_exists -- Проверить наличие указанного файла или каталога
if (file_exists("modules/" . $mod . "_proc.php")) {
    $process = "modules/" . $mod . "_proc.php";
}
if (file_exists("modules/" . $mod . ".php")) {
    $content = "modules/" . $mod . ".php"; 
}
else {
    header("Location: /demo/"); 
}
//  Подключаем модуль загрузки изображений и передаем верстку
$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
mysqli_set_charset($conn, "utf8");
require "modules/functions.php";

if ($process) include $process;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ДЗ<?= $title ? " - ".$title : "" ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul>
        <li><a href="?mod=gallery">Галерея</a></li>
        <li><a href="?mod=feedback">Отзывы</a></li>
        <li><a href="?mod=catalog">Каталог</a></li>
    </ul>
    <h1><?=$title;?></h1>
    <?php
    require $content;   
    ?>
</body>
</html>
