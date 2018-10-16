<?php

$input = intval(readline());
for ($i = 2; $i <= $input; $i++) {
    $value = true;
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j == 0) {
            $value = false;
            break;
        }
    }

    if ($value){
        printf("%d -> true" . PHP_EOL, $i);
    }
    else{
        printf("%d -> false" . PHP_EOL, $i);
    }
}
