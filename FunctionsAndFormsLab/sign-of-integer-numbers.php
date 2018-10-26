<?php

$n = intval(readline());

printSign($n);

function printSign($number){
    if($number > 0){
        echo "The number $number is positive.";
    } elseif($number < 0) {
        echo "The number $number is negative.";
    } else {
        echo "The number $number is zero.";
    }
}

