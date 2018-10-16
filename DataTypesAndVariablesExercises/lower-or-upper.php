<?php

$letter = readline();

if(ord($letter) > 64 && ord($letter) < 91){
    echo 'upper-case';
} elseif (ord($letter) > 96 && ord($letter) < 123) {
    echo 'lower-case';
}

