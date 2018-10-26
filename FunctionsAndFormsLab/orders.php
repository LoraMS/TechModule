<?php

$product = strtolower(readline());
$quantity = intval(readline());
calculateOrder($product, $quantity);

function calculateOrder($product, $quantity){
    $price = 0;
    switch ($product) {
        case 'coffee':$price = 1.50;
            break;
        case 'water':$price = 1.00;
            break;
        case 'coke':$price = 1.40;
            break;
        case 'snacks':$price = 2.00;
            break;
    }
    $order = $price * $quantity;
    echo sprintf("%.2f", $order);
}

