<?php

$arr = array_map('intval', explode(' ', readline()));
$result = [];

for ($i = 0; $i < count($arr); $i++) {
    $isTop = false;
    for ($j = $i+1; $j < count($arr); $j++) {
        if ($arr[$i] > $arr[$j]) {

            $isTop = true;
        } else {
            $isTop = false;
            break;
        }
    }
    if ($isTop) {
        $result[] = $arr[$i];
    }
}

$lastElement = end($arr);
array_push($result, $lastElement);
    
echo implode(' ', $result);

