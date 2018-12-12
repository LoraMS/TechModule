<?php

$amount = floatval(readline());
$guests = intval(readline());
$bananasPrice = floatval(readline());
$eggsPrice = floatval(readline());
$berriesPrice = floatval(readline());

$sets = ceil($guests / 6);

$money = $sets*(2*$bananasPrice) + $sets*(4*$eggsPrice) + $sets*(0.2*$berriesPrice);

if($amount >= $money){
    echo 'Ivancho has enough money - it would cost '.sprintf('%.2f', $money).'lv.';
} else {
    echo 'Ivancho will have to withdraw money - he will need '.sprintf('%.2f', $money - $amount).'lv more.';
}