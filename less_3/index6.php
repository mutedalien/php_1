<?php

$menu = array ("Главная", "Товары" => array ("Смартфоны", "Планшеты", "Ноутбуки"), "О нас" => array ("Команда", "В прессе", "Отзывы"), "Обратная связь");
echo "<ul>";
foreach ($menu as $more => $p) {
if (gettype($p) == "array" ) { //gettype - получает тип переменной 
		echo "<li>".$more."<ul>";
	foreach ($p as $t) {
		echo "<li>".$t."</li>";
		}
		echo "</ul>";
	}
	else echo "<li>".$p."</li>";
}

?>
