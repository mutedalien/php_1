<?php
include('bd.php');

$status = (int)$_GET['status'];
$id = (int)$_GET['id'];

$query = "UPDATE orders SET status = $status WHERE orders.id = $id";
echo mysqli_query($link, $query);
?>