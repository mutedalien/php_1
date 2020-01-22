<?php

$arg1=rand( -90, 90);
$arg2=rand( -90, 90);

function summa($arg1, $arg2){
return $arg1+$arg2;
}
function raznost($arg1, $arg2){
return $arg1-$arg2;
}
function proizv($arg1, $arg2){
return $arg1*$arg2;
}
function chastn($arg1, $arg2){
return $arg1/$arg2;
}

echo summa($arg1, $arg2), " ";
echo raznost($arg1, $arg2), " ";
echo proizv($arg1, $arg2), " ";
echo chastn($arg1, $arg2), " ";
?>