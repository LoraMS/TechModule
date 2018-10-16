<?php

$n = intval(readline());

for ($index = 1; $index <= $n; $index++) {
    $sum = 0;
    if($index > 9){
        $secondDigit = $index % 10;
        $firstDigit = ($index / 10) % 10;
        $sum = $firstDigit + $secondDigit;
    } else {
        $sum = $index;
    }
    
    if($sum === 5 || $sum === 7 || $sum === 11){
        echo "$index -> True\n";
    } else {
         echo "$index -> False\n";
    }
}

