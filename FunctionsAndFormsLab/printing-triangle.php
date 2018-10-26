<?php

$n = intval(readline());
printTriangle($n);

function printLine($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        echo "$i ";
    }
    echo PHP_EOL;
}

function printTriangle($n) {
    for ($i = 1; $i <= $n; $i++) {
        printLine(1, $i);
    }

    for ($j = $n - 1; $j >= 1; $j--) {
        printLine(1, $j);
    }
}


//for ($i = 1; $i <= $n; $i++) {
//    for ($j = 1; $j <= $i; $j++) {
//        echo $j . ' ';
//    }
//    echo PHP_EOL;
//}
//
//for ($x = $n - 1; $x >= 1; $x--) {
//    for ($y = 1; $y <= $x; $y++) {
//        echo $y . ' ';
//    }
//    echo PHP_EOL;
//}
