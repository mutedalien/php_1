<?php
echo "аргумент 1: ", $arg1=rand( -10, 10), " ";
echo "аргумент 2: ", $arg2=rand( -10, 10), " ";
echo "арифметическая операция ", $operation = "+", " ";
function mathOperation($arg1, $arg2, $operation) {
switch ($operation){

case "+":
return $arg1+$arg2;
break;

case "-":
return $arg1-$arg2;
break;

case "*":
return $arg1*$arg2;
break;

case "/":
return $arg1/$arg2;
break;
}

}
echo $arg1, $operation, $arg2, " = ", mathOperation($arg1, $arg2, $operation) ;

?>