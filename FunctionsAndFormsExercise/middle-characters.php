<?php

$str = readline();
echo findMidChar($str);

function findMidChar($str){
    $len = strlen($str);
    if($len % 2 === 0){
       $middle = $str[$len/2-1];
       $middle .= $str[$len/2];
       return $middle;
    } else {
        $middle = intval($len/2);
        return $str[$middle];
    }
}

