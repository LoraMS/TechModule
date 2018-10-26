<?php

$str = strtolower(readline());

function countVowels($str){
    $counter = 0;
    $vowels = ['a', 'o', 'u', 'e', 'i'];
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $vowels)) {
            $counter ++;
        }
    }
    echo  $counter;
}

countVowels($str);