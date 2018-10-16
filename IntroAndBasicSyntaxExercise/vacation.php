<?php

$group = intval(readline());
$groupType = strtolower(readline());
$day = strtolower(readline());

$pricePerPerson = 0;
$price = 0;

if ($groupType === 'students') {
    if ($day === 'friday') {
        $pricePerPerson = 8.45;
    } elseif ($day === 'saturday') {
        $pricePerPerson = 9.80;
    } elseif ($day === 'sunday') {
        $pricePerPerson = 10.46;   
    }
    $total = $pricePerPerson * $group;
    if($group >= 30){
        $price = $total - $total * 0.15;
    } else {
        $price = $total;
    }
} elseif ($groupType === 'business') {
    if ($day === 'friday') {
        $pricePerPerson = 10.90;
    } elseif ($day === 'saturday') {
        $pricePerPerson = 15.60;
    } elseif ($day === 'sunday') {
        $pricePerPerson = 16;
    }
    $total = $pricePerPerson * $group;
    if($group >= 100){
        $price = $total - $pricePerPerson * 10;
    } else {
        $price = $total;
    }
} elseif ($groupType === 'regular') {
    if ($day === 'friday') {
       $pricePerPerson = 15; 
    } elseif ($day === 'saturday') {
        $pricePerPerson = 20;
    } elseif ($day === 'sunday') {
        $pricePerPerson = 22.50;
    }
    $total = $pricePerPerson * $group;
    if($group >= 10 && $group <= 20){
        $price = $total - $total * 0.05;
    } else {
        $price = $total;
    }
}

echo 'Total price: '.number_format($price, 2, '.', '');