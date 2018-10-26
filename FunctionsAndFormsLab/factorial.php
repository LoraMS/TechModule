<?php

$n = intval(readline());

$factorial = function ($n){
    $factorial = 1;
    for ($i = 1; $i <= $n; $i++){
        $factorial = bcmul($factorial, $i);
    }

    return $factorial;
};

printf("%s", $factorial($n));

