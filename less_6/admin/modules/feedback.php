<?php
if ($feedback['id']) {
    include "modules/feedback_edit.php"; // Конструкция include предназначена для включения файлов в код сценария PHP во время исполнения сценария PHP
}
else {
    include "modules/feedback_list.php";
}