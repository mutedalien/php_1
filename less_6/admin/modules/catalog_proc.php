<?php
// Механизм редактирования или удаления товаров
$title = "Каталог";

if ($_GET['act']) {
    $act = (string)htmlspecialchars(strip_tags($_GET['act']));
    doCatalogAction($act, intval($_GET['id']));
}

if ($_POST['add']) {
    doCatalogAction('add', true);
}

function doCatalogAction($action, $id) {
    if ($id) {
        global $conn;
        switch ($action) {
            case 'delete': // Действия в случае удаления товара
                mysqli_query($conn, "DELETE FROM products WHERE id=$id LIMIT 1");
                header("Location: /admin/?mod=catalog");
                break;
            case 'add':
                global $message;
                $name = (string)htmlspecialchars(strip_tags($_POST['name']));
                $description = (string)htmlspecialchars(strip_tags($_POST['description']));
                $price = (float)htmlspecialchars(strip_tags($_POST['price']));
                if($_FILES['img']) {
                    if (!preg_match("/^image\/.+$/", $_FILES['img']['type'])) {
                        $message = "Error: wrong file type!";
                    } elseif ($_FILES['img']['error']) {
                        $message = "Error " . $_FILES['img']['error'];
                    } else {
                        $imgName = friendlyName($_FILES['img']['name']);
                        if (move_uploaded_file($_FILES['img']['tmp_name'], "../".CATALOG_IMAGES_PATH.$imgName)) {
                            mysqli_query($conn, "INSERT INTO products (name, price, description, image)
                                            VALUES ('$name','".$price."','".$description."','".$imgName."')");
                            create_thumbnail("../".CATALOG_IMAGES_PATH.$imgName,
                                "../".CATALOG_IMAGES_PATH."thumbnail/tn_".$imgName, 160, 120);
                        } else {
                            $message = "Error while uploading image!";
                        }
                    }
                }
                else {
                    $message = "Надо обязательно выбрать кратинку!";
                }
                break;
            case 'edit': // Действия в случае редактирования товара
                global $product, $title;
                $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
                $product = mysqli_fetch_assoc($result);
                $title .= " - Редактирование - ".$product['name'];
                if ($_POST['edit']) {
                    global $message;
                    $update['name'] = (string)htmlspecialchars(strip_tags($_POST['name']));
                    $update['description'] = (string)htmlspecialchars(strip_tags($_POST['description']));
                    $update['price'] = (float)htmlspecialchars(strip_tags($_POST['price']));
                    foreach ($update as $k => $val) {
                        if ($val != $product[$k]) $values[] = $k."='".$val."'";
                    }
                    if($_FILES['img']) {
                        if (!preg_match("/^image\/.+$/", $_FILES['img']['type'])) {
                            $message = "Error: wrong file type!";
                        } elseif ($_FILES['img']['error']) {
                            $message = "Error " . $_FILES['img']['error'];
                        } else {
                            $imgName = friendlyName($_FILES['img']['name']);
                            if (move_uploaded_file($_FILES['img']['tmp_name'],
                                "../".CATALOG_IMAGES_PATH.$imgName)) {
                                $values[] = "image='".$imgName."'";
                                create_thumbnail("../".CATALOG_IMAGES_PATH.$imgName,
                                    "../".CATALOG_IMAGES_PATH."thumbnail/tn_".$imgName, 160, 120);
                                unlink("../".CATALOG_IMAGES_PATH.$product['image']);
                                unlink("../".CATALOG_IMAGES_PATH."thumbnail/tn_".$product['image']);
                            } else {
                                $message = "Error while uploading image!";
                            }
                        }
                    }
                    if ($values) {
                        mysqli_query($conn, "UPDATE products SET ".implode(", ", $values)." WHERE id=$id LIMIT 1");
                    }
                    header("Location: /admin/?mod=catalog");
                }
                break;
        }
    }
}