<?php

$arr = explode(' ', readline());
$rotations = intval(readline());

for ($i = 0; $i < $rotations; $i++) {
    $lastElement = array_shift($arr);
    array_push($arr, $lastElement);
}

echo implode(' ', $arr);