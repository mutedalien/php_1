<?php

$area = array ("Московская область:" => array ("Москва", "Зеленоград", "Клин"),
	"Ленинградская область:" => array ("Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"),
	"Рязанская область:" => array ("Рязань", "Касимов", "Сасово", "Шацк"));
foreach ($area as $region => $cities) {
	echo $region."<br>".implode(', ',$cities)."<br>";

}

?>