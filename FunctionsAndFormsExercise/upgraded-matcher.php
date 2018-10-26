<?php

$products = explode(' ', readline());
$quantities = array_map('floatval', explode(' ', readline()));
$prices = array_map('floatval', explode(' ', readline()));

while (true) {
    $input = readline();
    if($input === 'done'){
        break;
    }
    $line = explode(' ', $input);
    $productName = $line[0];
    $quantityOrder = $line[1];
    
    $index = array_search($productName, $products);
    $price = $prices[$index];
    if($index >= 0 && $index < count($quantities)){
        $quantuty = $quantities[$index];
    } else {
        $quantuty = 0;
    }
    
    if($quantuty >= $quantityOrder){
        $totalPrice = sprintf('%.2f', $quantityOrder * $price);
        $quantities[$index] -= $quantityOrder;
        echo "$productName x $quantityOrder costs $totalPrice".PHP_EOL;
    } else {
        echo "We do not have enough $productName".PHP_EOL;
    }
}


