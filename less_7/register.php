<?php
include('bd.php');

function console($val)
{
  echo '<script>console.log(' . json_encode($val) . ')</script>';
}
// Читаем содержимое полей ввода. Если такого пользователя нет, то заносим его в БД
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name'])) {
  $login = $_POST['login'];
  $pass = md5($_POST['password']); 
  $name = $_POST['name'];
  $queryPass = "SELECT * FROM users where login='$login'";
  $queryPass = mysqli_query($link, $queryPass);
  $res = mysqli_fetch_assoc($queryPass);
  if(!$res){
    $insertUser = "INSERT INTO users (id, login, pass, name) VALUES (NULL, '$login', '$pass', '$name')";
    $queryPass = mysqli_query($link, $insertUser);
    $isInsert = $queryPass;
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
<? if ($res): ?>
  <h3 class="danger">Такой логин уже зарегестрирован</h3>
<? endif ?>

<? if ($isInsert): ?>
  <h3 class="success">Успешно зарегестрированны</h3>
<? endif ?>
<form class="register" action="" method="post">
  <input type="text" placeholder="login" name="login"><br>
  <input type="password" placeholder="password" name="password"><br>
  <input type="text" placeholder="name" name="name"><br>
  <input type="submit" value="register">
</form>
</body>
</html>