<?php

while (true) {
    $n = intval(readline());
    
    if($n % 2 != 0){
        echo 'Please write an even number.'."\n";
    } else {
        echo "The number is: " . abs($n);
        break;
    }
}

