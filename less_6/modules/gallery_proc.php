<?php
$title = "Галерея";

if($_GET['img']) {
    $id = intval($_GET['img']);
    mysqli_query($conn, "UPDATE gallery_images SET views=views+1 WHERE id=$id LIMIT 1");    // Считаем просмотры
    $result = mysqli_query($conn, "SELECT * FROM gallery_images WHERE id=$id LIMIT 1");
    $img = mysqli_fetch_assoc($result); // mysqli_fetch_assoc — Извлекает результирующий ряд в виде ассоциативного массива
    $title .= " - ".$img['name'];
}
// Загружаем картинки в галлерею
if($_FILES['img']) {
    if (!preg_match("/^image\/.+$/", $_FILES['img']['type'])) { // preg_match -- Выполняет проверку на соответствие регулярному выражению (в нашем случае - тип)
        $message = "Error: wrong file type!";
    } elseif ($_FILES['img']['error']) {
        $message = "Error " . $_FILES['img']['error'];
    } else { // Если ошибок нет, то продолжаем...
        $name = friendlyName($_FILES['img']['name']); // Присваиваем имя функцией из function.php
        $size = $_FILES['img']['size'];
        if (move_uploaded_file($_FILES['img']['tmp_name'], GALLERY_IMAGES_PATH.$name)) { // move_uploaded_file - Перемещает загруженный файл в новое место
            $message = "Image uploaded successfully!"; 
            mysqli_query($conn, "INSERT INTO gallery_images (name, path, size) VALUES ('$name', '".GALLERY_IMAGES_PATH."', $size)");
            create_thumbnail(GALLERY_IMAGES_PATH.$name, GALLERY_IMAGES_PATH."thumbnail/tn_".$name, 160, 120); // Создаем миниатюру установленного размера
        } else {
            $message = "Error while uploading image!";
        }
    }
}