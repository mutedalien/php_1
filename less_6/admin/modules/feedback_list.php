<div>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM feedback");
    while ($feedback = mysqli_fetch_assoc($result)) {
        echo "<div class='feedback'><div><span>".$feedback['nickname']."</span>
<a href='?mod=feedback&act=delete&id=".$feedback['id']."'>Удалить</a>
<a href='?mod=feedback&act=edit&id=".$feedback['id']."'>Редактировать</a><p>".$feedback['feedback']."</p></div></div>\n";
    }
    ?>
</div>
<form action="" method="POST">
    <fieldset class="feedback-form">
        <legend>Добавить отзыв</legend>
        <div>
            <p><input name="nickname" type="text" placeholder="Введите ваше имя"></p>
            <p><textarea name="feedback" cols="60" rows="10" placeholder="Введите ваш отзыв" required></textarea></p>
            <p><input type="submit"></p>
        </div>
    </fieldset>
</form>