<?php

$n = intval(readline());
$arr = [];

for ($i = 0; $i < $n; $i++) {
    $product = readline();
    $arr[] = $product;
}

sort($arr);
for ($j = 0; $j < count($arr); $j++) {
    echo ($j + 1).".$arr[$j]\n";
}

