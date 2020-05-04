<?php

$link = mysqli_connect('localhost', 'root', '', 'img') or die(mysqli_error($link)); // Коннектимся простым способом к базе

$idImg = (int)$_GET["img"];
$select = "SELECT * FROM IMG WHERE id = $idImg"; 
$res = mysqli_query($link, $select) or die(mysqli_error($link)); // Выбираем данные из базы или возвращаем ошибку
$image = mysqli_fetch_assoc($res); // Собираем данные в ассоциативный массив
$count = ++$image['count']; // Получаем значение количества просмотров
$update = "UPDATE img SET count = $count WHERE id = $idImg";
mysqli_query($link, $update) or die(mysqli_error($link)); // Обновляем значения

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gallery</title>
</head>
<body>
<p>
<h3><?= $image["title"] ?></h3>
</p>
<img src="images/max/<?= $image["link"] ?>" alt="<?= $image["title"] ?>">
<p>
<h4>Просмотров <?= $image['count'] ?></h4>
</p>
</body>
</html>