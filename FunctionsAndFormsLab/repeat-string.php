<?php

$str = readline();
$count = intval(readline());

echo repeatString($str, $count);

function repeatString($str, $count) {
    $result = "";
    for ($i = 0; $i < $count; $i++){
        $result .= $str;
    }
    return $result;
}

    