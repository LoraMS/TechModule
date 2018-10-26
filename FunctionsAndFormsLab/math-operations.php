<?php

$firstNum = intval(readline());
$operator = readline();
$secondNum = intval(readline());

echo calculate($firstNum, $secondNum, $operator);

function calculate($firstNum, $secondNum, $operator){
    $result = 0.0;
    switch ($operator) {
        case '+':$result = $firstNum + $secondNum;
            break;
        case '-':$result = $firstNum - $secondNum;
            break;
        case '*':$result = $firstNum * $secondNum;
            break;
        case '/':$result = $firstNum / $secondNum;
            break;
        default:
            break;
    }
    return sprintf("%.2f", $result);
}

