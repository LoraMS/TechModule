<?php

$arr = explode(' ', readline());
$sum = 0;

for ($i = 0; $i < count($arr); $i++) {
    if($arr[$i] % 2 === 0){
        $sum += $arr[$i];
    }
}

echo $sum;
