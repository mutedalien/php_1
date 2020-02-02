<?php
$title = "Каталог";
if($_GET['prod']) {
    $id = intval($_GET['prod']); // intval - получает целочисленное значение переменной
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $prod = mysqli_fetch_assoc($result); // mysqli_fetch_assoc — Извлекает результирующий ряд в виде ассоциативного массива
    $title .= " - ".$prod['name'];
}
