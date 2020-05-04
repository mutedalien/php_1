<?php
session_start(); // Удерживаем сессию

if ($_POST['add_order'] === 'success') { 
  header("Location: /");
  exit;
}
include('bd.php'); // Подключаем файл соединения с БД

function console($val)
{
  echo '<script>console.log(' . json_encode($val) . ')</script>';
}

$query = mysqli_query($link, 'SELECT * FROM goods');
$id = !empty($_POST['id']) && is_numeric($_POST['id']) ? (int)$_POST['id'] : 0;
$productQuery = mysqli_query($link, "SELECT * FROM goods where id = $id");
$productRes = mysqli_fetch_assoc($productQuery);

if (isset($_POST['del'])) {
  unset($_SESSION['basket']['good'][$_POST['del']]); // Удаляем из корзины
}
if (isset($_POST['add'])) {
  $_SESSION['basket']['good'][$_POST['add']]['count']++; // Добавляем в корзину
}

if (isset($_SESSION['basket']['good'])) {
  $basketSession = $_SESSION['basket']['good'];
  $q = implode(array_keys($basketSession), ',');
  if ($q) {
    $queryBasket = mysqli_query($link, "SELECT * FROM goods where id in($q)");
    $products = [];
    while ($row = mysqli_fetch_assoc($queryBasket)) {
      $products[] = $row;
    }
  }
}

$message = ['text' => '', 'class' => ''];
if (isset($_POST['add_order'])) {
  if ($_SESSION['login'] === null) {
    $message['text'] = 'Вы не авторизованы'; // Проверка наличия активной сессии перед заказом
    $message['class'] = 'error';
  } else {
    $date = date('Y-m-d');

    $jsonProducts = mysqli_real_escape_string($link, json_encode($products));

    $insertUser = "
      INSERT INTO orders (id, products, id_user, status, date) VALUES
      (NULL, '{$jsonProducts}', '{$_SESSION['login']}', 1, '{$date}')";

    $message['text'] = mysqli_query($link, $insertUser) or die(mysqli_error($link));
    if (is_numeric(+$message['text'])) {
      $message['text'] = 'Заказ успешно добавлен!';
      $message['class'] = 'success';
      $_GET['success'] = 1;
      unset($_SESSION['basket']['good']);
    } else {
      $message['text'] = 'Заказ не удалось добавить';
      $message['class'] = 'error';
    }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="auth">
  <?php include('auth.php');
  if($_SESSION['is_admin']): // Проверка на админа
  ?>
  <a href="admin.php">Заказы</a>
  <?php elseif ($_SESSION['login'] !== null): ?>
  <a href="profile.php">Личный кабинет</a>
  <?php endif; ?>
</div>
<!-- Рисуем страницу товаров -->
<form action="" method="post">
  <div class="table">
    <label class="head">Title</label>
    <label class="head">Description</label>
    <label class="head">price</label>
    <label class="head">view</label>
    <label class="head">add</label>
    <? while ($row = mysqli_fetch_assoc($query)) : ?>
      <div><?= $row['good'] ?></div>
      <div><?= $row['description'] ?></div>
      <div><?= $row['price'] ?></div>
      <div>
        <button value="<?= $row['id'] ?>" name="id">view</button>
      </div>
      <div>
        <button value="<?= $row['id'] ?>" name="add">add</button>
      </div>
    <? endwhile ?>
  </div>
</form>
<div class="detail" <? if (!$id): ?> style="display: none" <? endif ?>>
  <div class="detail__column">
    <label for="">Title</label>
    <label for="">Description</label>
    <label for="">Price</label>
  </div>
  <div class="detail__column">
    <label for=""><?= $productRes['good'] ?></label>
    <label for=""><?= $productRes['description'] ?></label>
    <label for=""><?= $productRes['price'] ?></label>
  </div>
</div>
<hr>
<!-- Рисуем содержимое корзины -->
<? if ($queryBasket): ?>
  <h2>Корзина</h2>
  <form action="" method="post">
    <div class="basket">
      <label class="head">Title</label>
      <label class="head">Description</label>
      <label class="head">price</label>
      <label class="head">count</label>
      <label class="head">view</label>
      <label class="head">delete</label>
      <label class="head">add</label>

      <? foreach ($products as $row) : ?>
        <div><?= $row['good'] ?></div>
        <div><?= $row['description'] ?></div>
        <div><?= $row['price'] ?></div>
        <div><?= $basketSession[$row['id']]['count'] ?></div>
        <div>
          <button value="<?= $row['id'] ?>" name="id">view</button>
        </div>
        <div>
          <button value="<?= $row['id'] ?>" name="del">del</button>
        </div>
        <div>
          <button value="<?= $row['id'] ?>" name="add">add</button>
        </div>
      <? endforeach ?>
      <div class="">
        <button value="<?= $message['class'] ?>" name="add_order" class="add-order">
          <?= $message['class'] === 'success' ? 'Вернуться в магазин' : 'Add order' ?>
        </button>
      </div>
      <div class="">
        <h3 value="" class="<?= $message['class'] ?> add-order"><?= $message['text'] ?></h3>
      </div>
    </div>
  </form>
<? endif ?>
</body>
</html>