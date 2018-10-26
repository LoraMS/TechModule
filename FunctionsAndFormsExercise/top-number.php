<?php

$num = intval(readline());
for ($i = 0; $i <= $num; $i++) {
    if(sumDigits($i) % 8 === 0 && holdOddDigit($i)){
        echo $i.PHP_EOL;
    }
}

function holdOddDigit($n) {
    $holdOdd = false;
    while ($n > 0) {
        $m = $n % 10; 
        if ($m % 2 !== 0) {
            $holdOdd = true;
        }
        $n = (int)($n / 10); 
    }
    return $holdOdd;
}

function sumDigits($n) {
    $sum = 0;
    do {
        $sum += $n % 10;
    } while ($n = (int) $n / 10);
    return $sum;
}
