<?php

$n = intval(readline());

printMatrix($n);

function printMatrix($n){
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            echo str_repeat("$n", 1).' ';
        }
        echo PHP_EOL;
    }
}


