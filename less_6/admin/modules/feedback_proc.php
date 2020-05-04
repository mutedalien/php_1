<?php
// Механизм редактирование или удаление отзыва
include "../modules/feedback_proc.php";

if ($_GET['act']) {
    $act = (string)htmlspecialchars(strip_tags($_GET['act']));
    doFeedbackAction($act, intval($_GET['id']));
}

function doFeedbackAction ($action, $id) {
    global $conn;
    switch ($action) {
        case 'delete': // Действия в случае удаления отзыва
            mysqli_query($conn, "DELETE FROM feedback WHERE id=$id LIMIT 1");
            header("Location: /admin/?mod=feedback");
            break;
        case 'edit': // Действия в случае редактирования отзыва
            global $feedback, $title;
            $result = mysqli_query($conn, "SELECT * FROM feedback WHERE id=$id");
            $feedback = mysqli_fetch_assoc($result);
            $title .= " - Редактирование - ".$feedback['id'];
            if ($_POST['edit']) {
                $update['nickname'] = substr((string)htmlspecialchars(strip_tags($_POST['nickname'])), 0, 64);
                $update['feedback'] = (string)htmlspecialchars(strip_tags($_POST['feedback']));
                foreach ($update as $k => $val) {
                    if ($val != $feedback[$k]) $values[] = $k."='".$val."'";
                }
                if ($values) {
                    mysqli_query($conn, "UPDATE feedback SET ".implode(", ", $values)." WHERE id=$id LIMIT 1");
                }
                header("Location: /admin/?mod=feedback");
            }
            break;
    }
}