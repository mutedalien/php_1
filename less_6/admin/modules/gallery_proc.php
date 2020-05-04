<?php
// Механизм удаления картинки из галлереи
$title = "Галерея";

if ($_GET['act'] == 'delete') { // Действия в случае удаления картинки
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT name, path FROM gallery_images WHERE id=$id");
    $img = mysqli_fetch_assoc($result);
    unlink("../".$img['path'].$img['name']);
    unlink("../".$img['path']."thumbnail/tn_".$img['name']);
    mysqli_query($conn, "DELETE FROM gallery_images WHERE id=$id LIMIT 1");
    header("Location: /admin/?mod=gallery");
}