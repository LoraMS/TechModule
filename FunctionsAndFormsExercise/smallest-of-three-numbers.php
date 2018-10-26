<?php

$numFirst = intval(readline());
$numSecond = intval(readline());
$numThird = intval(readline());

function findMinNumber($numFirst, $numSecond, $numThird){
    return min($numFirst, $numSecond, $numThird);
}

echo findMinNumber($numFirst, $numSecond, $numThird);

