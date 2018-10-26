<?php

$num = intval(readline());

printTribonacci($num);

function printTribonacci($n) {
    $fibNum1 = 1;
    $fibNum2 = 1;
    $fibNum3 = 2;
    for ($i = 1; $i <= $n; $i++) {
        if ($i == 1 || $i == 2) {
            echo 1 . " ";
        } else if ($i == 3) {
            echo 2 . " ";
        } else if ($i == $n) {
            $result = $fibNum1 + $fibNum2 + $fibNum3;
            echo $result;
            $fibNum1 = $fibNum2;
            $fibNum2 = $fibNum3;
            $fibNum3 = $result;
        } else {
            $result = $fibNum1 + $fibNum2 + $fibNum3;
            echo $result . " ";
            $fibNum1 = $fibNum2;
            $fibNum2 = $fibNum3;
            $fibNum3 = $result;
        }
    }
}
