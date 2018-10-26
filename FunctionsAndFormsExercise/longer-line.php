<?php

$x1 = readline();
$y1 = readline();
$x2 = readline();
$y2 = readline();
$x3 = readline();
$y3 = readline();
$x4 = readline();
$y4 = readline();

$lenghtLine1 = calculateLineLenght($x1, $y1, $x2, $y2);
$lenghtLine2 = calculateLineLenght($x3, $y3, $x4, $y4);

if ($lenghtLine1 >= $lenghtLine2) {
    $isClosest = checkClosestToZero($x1, $y1, $x2, $y2);

    if ($isClosest) {
        echo "($x1, $y1)($x2, $y2)";
    } else {
        echo "($x2, $y2)($x1, $y1)";
    }
} else {
    $isClosest = checkClosestToZero($x3, $y3, $x4, $y4);
    if ($isClosest) {
        echo "($x3, $y3)($x4, $y4)";
    } else {
        echo "($x4, $y4)($x3, $y3)";
    }
}

function calculateLineLenght($x1, $y1, $x2, $y2) {
    return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
}

function checkClosestToZero($x1, $y1, $x2, $y2) {
    $distanceFirst = sqrt(pow($x1, 2) + pow($y1, 2));
    $distanceSecond = sqrt(pow($x2, 2) + pow($y2, 2));

    if ($distanceFirst <= $distanceSecond) {
        return true;
    }

    return false;
}