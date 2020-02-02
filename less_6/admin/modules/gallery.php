<?php
$result = mysqli_query($conn, "SELECT * FROM gallery_images ORDER BY views DESC");
while ($img = mysqli_fetch_assoc($result)) {
    echo "<div class='thumbnail'><a href='../".GALLERY_IMAGES_PATH.$img['name']."' target='_blank' title='".$img['name']."'>
    <img src='../".GALLERY_IMAGES_PATH."thumbnail/tn_".$img['name']."' alt='".$img['name']."'></a>
    <p>Views: ".$img['views']."</p>    <p><a href='?mod=gallery&act=delete&id=".$img['id']."'>Удалить</a></p></div>\n";
}