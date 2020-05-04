<?php
function sum($a, $b) {
    return $a + $b;
}
function subtract($a, $b) {
    return $a - $b;
}
function multiply($a, $b) {
    return $a * $b;
}
function divide($a, $b) {
    if ($b == 0) return "На ноль делить нельзя!";
    return $a / $b;
}
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "+":
            return sum($arg1, $arg2);
        case "-":
            return subtract($arg1, $arg2);
        case "*":
            return multiply($arg1, $arg2);
        case "/":
            return divide($arg1, $arg2);
        default:
            return false;
    }
}