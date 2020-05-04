<?php
$products = mysqli_query($conn, "SELECT * FROM products");
while ($prod = mysqli_fetch_assoc($products)) {
echo "<div class='product'><img src='../".CATALOG_IMAGES_PATH."thumbnail/tn_".$prod['image']."'>
<span class='name'>".$prod['name']."</span><span class='options'>
<a href='?mod=catalog&act=edit&id=".$prod['id']."'>Изменить</a>
<a href='?mod=catalog&act=delete&id=".$prod['id']."'>Удалить</a></span><br>
<span>Цена: ".$prod['price']."</span><p>".$prod['description']."</p></div>\n";
}
?>
<form enctype="multipart/form-data" action="" method="POST">
    <fieldset class="admin-form">
        <legend>Добавить товар</legend>
        <div>
            <table>
                <tr>
                    <td><label for="name">Наименование:</label></td>
                    <td><input name="name" id="name" type="text" required></td>
                </tr>
                <tr>
                    <td><label for="price">Цена:</label></td>
                    <td><input name="price" id="price" type="number" min="0.01" step="0.01" required></td>
                </tr>
                <tr>
                    <td><label for="description">Описание:</label></td>
                    <td><textarea name="description" id="description" cols="60" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="file">Картинка:</label></td>
                    <td><input name="img" id="file" type="file" required accept="image/*"> <?=$message;?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br><input type="submit" name="add"></td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>