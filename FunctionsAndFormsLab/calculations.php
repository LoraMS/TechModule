<?php

$command = readline();
$a = readline();
$b = readline();

switch ($command) {
    case 'add': add($a, $b);
        break;
    case 'subtract': subtract($a, $b);
        break;
    case 'multiply': multiply($a, $b);
        break;
    case 'divide': divide($a, $b);
        break;
    default:
        break;
}

function add($a, $b){
    echo $a + $b;
}

function subtract($a, $b){
    echo $a - $b;
}

function multiply($a, $b){
    echo $a * $b;
}

function divide($a, $b){
    if ($b !== 0) {
        echo $a / $b;
    } 
}