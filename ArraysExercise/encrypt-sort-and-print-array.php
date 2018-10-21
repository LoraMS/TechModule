<?php

$n = intval(readline());
$vowels = ['a','e','i','o','u', 'A', 'E', 'I', 'O', 'U'];
$result = [];


for ($i = 0; $i < $n; $i++) {
    $name = readline();
    $len = strlen($name);
    $sum = 0;
    for ($j = 0; $j < $len; $j++) {
        if (in_array($name[$j], $vowels)) {
            $sum +=  intval(ord($name[$j]) * $len);
        } else {
            $sum += intval(ord($name[$j]) / $len);
        }
    }
    $result[] = $sum;
}

sort($result);
echo implode("\n", $result);

