<?php

$num = intval(readline());
$sum = 0;

while ($num > 0) {
    $lastDigit = $num % 10;
    $sum += $lastDigit;
    $num = floor($num / 10);
}

echo $sum;
