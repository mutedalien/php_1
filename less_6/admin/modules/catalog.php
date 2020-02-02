<?php
if ($product['id']) {
    include "modules/catalog_edit.php"; //  Конструкция include предназначена для включения файлов в код сценария PHP во время исполнения сценария PHP
}
else {
    include "modules/catalog_list.php";
}