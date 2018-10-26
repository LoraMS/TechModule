<?php

$products = explode(' ', readline());
$quantities = explode(' ', readline());
$prices = explode(' ', readline());

while (true) {
    $input = readline();
    if($input === 'done'){
        break;
    }
    
    $index = array_search($input, $products);
    $price = $prices[$index];
    $quantuty = $quantities[$index];
    echo "$input costs: $price; Available quantity: $quantuty".PHP_EOL;
}

