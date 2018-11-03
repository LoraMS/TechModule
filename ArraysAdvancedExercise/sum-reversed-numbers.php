<?php

$numbers = explode(' ', readline());
$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $element = strrev($numbers[$i]);
    $sum += intval($element);
}

echo $sum;