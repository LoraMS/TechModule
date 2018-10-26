<?php

$width = floatval(readline());
$length = floatval(readline());

$area = calculateRectangleArea($width, $length);
echo $area;

function calculateRectangleArea($width, $length): float{
    return $width * $length;
}

