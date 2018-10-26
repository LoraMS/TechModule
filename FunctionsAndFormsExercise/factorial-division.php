<?php

$n = intval(readline());
$m = intval(readline());

$nFactorial = findFactorial($n);
$mFactorial = findFactorial($m);

echo sprintf('%.2f', $nFactorial / $mFactorial);

function findFactorial($num){
    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    
    return $factorial;
}

