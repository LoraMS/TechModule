<?php

$num = readline();
$power = intval(readline());

$result = calculateNumPower($num, $power);
echo $result;

function calculateNumPower($num, $power){
    return pow($num, $power);
}

