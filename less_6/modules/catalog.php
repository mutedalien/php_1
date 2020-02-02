<?php

if($_GET['prod']) {
    ?>
    <a href="/?mod=catalog">Вернуться в каталог</a><br>
    <a href="../admin/">Админка</a>
    <figure class="img">
        <p><img src="<?=CATALOG_IMAGES_PATH.$prod['image']?>" /></p>
        <figcaption>
            <?="<h3>".$prod['name']."</h3><p>Цена: ".$prod['price']."</p><p>".$prod['description']."</p>"?>
        </figcaption>
    </figure>
    <?php
}
else {
    $products = mysqli_query($conn, "SELECT * FROM products");
    while ($prod = mysqli_fetch_assoc($products)) {
        echo "<div class='product'><img src='" . CATALOG_IMAGES_PATH . "thumbnail/tn_" . $prod['image'] . "'>
    <span>Цена: <b>" . $prod['price'] . "</b></span>
    <a class='name' href='?mod=catalog&prod=" . $prod['id'] . "'>" . $prod['name'] . "</a><br></div>\n";
    }
}
