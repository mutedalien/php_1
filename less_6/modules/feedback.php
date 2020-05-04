<div>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM feedback"); // Извлекаем из базы содержимое табл feedback
    while ($feedback = mysqli_fetch_assoc($result)) { //    mysqli_fetch_assoc — Извлекает результирующий ряд в виде ассоциативного массива
        echo "<div class='feedback'><div><span>".$feedback['nickname']."</span><a name='".$feedback['id']."' href='#".$feedback['id']."'>#</a><p>".$feedback['feedback']."</p></div></div>\n";
    }
    ?>
</div>
<!-- Форма вывода отзывов -->
<form action="" method="POST">
    <fieldset class="feedback-form">
        <legend>Оставить отзыв</legend>
        <div>
            <p><input name="nickname" type="text" placeholder="Введите ваше имя"></p>
            <p><textarea name="feedback" cols="60" rows="10" placeholder="Введите ваш отзыв" required></textarea></p>
            <p><input type="submit" name="add"></p>
        </div>
    </fieldset>
</form>