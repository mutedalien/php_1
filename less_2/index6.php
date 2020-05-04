<?php

$hour = date(g);
$minute = date(i);

if ($hour >= 5 ){
    echo "сейчас $hour часов";
}
elseif ($hour < 5 && $hour !=1){
    echo "сейчас $hour часа";
}
else{
    echo "сейчас $hour час";
}

function minuteCut($x){
           return $x % 10;

}

if (minuteCut($minute) >= 5 || minuteCut($minute) == 0 ){
    echo " и  $minute минут";
}
elseif (minuteCut($minute) < 5 || minuteCut($minute)!= 1){
    echo " и $minute минуты";
}
else{
    echo " и $minute минутa";
}

