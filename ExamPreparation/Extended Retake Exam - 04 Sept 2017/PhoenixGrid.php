<?php
$pattern = '/^[^_\s]{3}(\.[^_\s]{3})*$/';
while (true){
    $input = readline();
    if($input === 'ReadMe'){
        break;
    }
    $reversed = strrev($input);
    if(preg_match($pattern, $input) && $input === $reversed){
        echo 'YES'.PHP_EOL;
    } else {
        echo 'NO'.PHP_EOL;
    }
}