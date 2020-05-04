<?php

$link = mysqli_connect('localhost', 'root', '', 'img') or die(mysqli_error($link)); // Коннектимся простым способом к базе
$sql = 'SELECT * FROM IMG ORDER BY count DESC';
$res = mysqli_query($link, $sql) or die(mysqli_error($link)); // Выбираем данные из базы или возвращаем ошибку
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Галерея</title>
</head>
<body>
<div>
  <? while ($row = mysqli_fetch_assoc($res)):?> <!-- Обходим массив с выбранными из базы данными -->
    <a rel="stylesheet" href="big.php?img=<?= $row["id"] ?>">
      <img src="images/min/<?= $row["link"] ?>" alt="<?= $row["title"] ?>"> <!-- Формируем путь к картинке -->
    </a>
  <? endwhile ?>
</div>
</body>
</html>