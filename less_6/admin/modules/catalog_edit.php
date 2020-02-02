<p><a href="/admin/?mod=catalog">Вернуться назад</a></p>
<form enctype="multipart/form-data" action="" method="POST">
    <fieldset class="admin-form">
        <legend>Изменить товар</legend>
        <div>
            <table>
                <tr>
                    <td><label for="id">id:</label></td>
                    <td><input type="text" id="id" disabled value="<?=$product['id'];?>"></td>
                </tr>
                <tr>
                    <td><label for="name">Наименование:</label></td>
                    <td><input name="name" id="name" type="text" value="<?=$product['name'];?>"></td>
                </tr>
                <tr>
                    <td><label for="price">Цена:</label></td>
                    <td><input name="price" id="price" type="number" min="0.01" step="0.01" value="<?=$product['price'];?>"></td>
                </tr>
                <tr>
                    <td><label for="description">Описание:</label></td>
                    <td><textarea name="description" id="description" cols="60" rows="10"><?=$product['description'];?></textarea></td>
                </tr>
                <tr>
                    <td><a href="../<?=CATALOG_IMAGES_PATH.$product['image'];?>" target="_blank"><img src="../<?=CATALOG_IMAGES_PATH."thumbnail/tn_".$product['image'];?>"><br><?=$product['image'];?></a></td>
                    <td><input name="img" id="file" type="file" accept="image/*"> <?=$message;?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br><input type="submit" name="edit"></td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>