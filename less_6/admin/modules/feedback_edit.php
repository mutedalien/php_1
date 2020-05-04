<form action="" method="POST">
    <fieldset class="feedback-form">
        <legend>Редактировать отзыв</legend>
        <table>
            <tr>
                <td><label for="id">id:</label></td>
                <td><input type="text" id="id" disabled value="<?=$feedback['id'];?>"></td>
            </tr>
            <tr>
                <td><label for="name">Имя:</label></td>
                <td><input name="nickname" id="name" type="text" value="<?=$feedback['nickname'];?>"></td>
            </tr>
            <tr>
                <td><label for="feedback">Описание:</label></td>
                <td><textarea name="feedback" id="feedback" cols="60" rows="10"><?=$feedback['feedback'];?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><br><input type="submit" name="edit"></td>
            </tr>
        </table>
    </fieldset>
</form>