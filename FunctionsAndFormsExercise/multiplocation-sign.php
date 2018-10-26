<?php

$n = intval(readline());
$m = intval(readline());
$p = intval(readline());

if ($n === 0 || $m === 0 || $p === 0) {
    echo 'zero';
} elseif((!checkIfPositive($n) && !checkIfPositive($m) && !checkIfPositive($p)) || (!checkIfPositive($n) && checkIfPositive($m) && checkIfPositive($p)) || (checkIfPositive($n) && !checkIfPositive($m) && checkIfPositive($p)) || (checkIfPositive($n) && checkIfPositive($m) && !checkIfPositive($p))){
    echo 'negative';
} else {
    echo 'positive';
}

function checkIfPositive($num){
    if($num > 0){
        return true;
    } 
        return false;
}
