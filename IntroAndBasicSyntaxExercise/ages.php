<?php

$age = intval(readline());

if($age >= 0 && $age <= 2){
    echo 'baby';
} elseif ($age > 2 && $age <= 13) {
    echo 'child';
} elseif ($age > 13 && $age <= 19) {
    echo 'teenager';
} elseif ($age > 19 && $age <= 65) {
    echo 'adult';
} elseif ($age >= 66) {
    echo 'elder';
}