<?php

while (true) {
    $input = readline();
    if($input === 'END'){
        break;
    }
    
    if(isPalindrome($input)){
        echo 'true'.PHP_EOL;
    } else {
        echo 'false'.PHP_EOL;
    }
    
}

function isPalindrome($num){
    $numReversed = strrev($num);
    if ($num === $numReversed) {
        return true;
    }
    return false;
}
