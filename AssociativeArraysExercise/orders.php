<?php

$products = [];
while (true) {
    $input = readline();
    if ($input === 'buy') {
        break;
    }
    
    $line = explode(' ', $input);
    $product = $line[0];
    $price = floatval($line[1]);
    $quantity = intval($line[2]);
    
    if(!key_exists($product, $products)){
        $products[$product]['price'] = $price;
        $products[$product]['quantity'] = $quantity;
    } else {
        $products[$product]['price'] = $price;
        $products[$product]['quantity'] += $quantity;
    }
}

foreach ($products as $product => $value) {
    $totalPrice = $value['price'] * $value['quantity'];
    echo $product .' -> '.sprintf('%0.2f', $totalPrice).PHP_EOL;
}
