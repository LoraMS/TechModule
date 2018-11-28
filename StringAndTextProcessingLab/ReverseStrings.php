<?php
while(true){
    $word = readline();
    if($word === 'end'){
        break;
    }

    echo "$word = ".strrev($word).PHP_EOL;
}