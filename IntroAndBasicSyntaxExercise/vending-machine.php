<?php

$sum = 0.00;
while (true) {
    $input = readline();
    if($input == 'Start'){
        break;
    }
    
    $coins = floatval($input);
    if ($coins != 0.10 && $coins != 0.20 && $coins != 0.50 && $coins != 1.00 && $coins != 2.00) {
        echo 'Cannot accept '. $input.PHP_EOL;
    } else {
        $sum += round($coins, 2);
    }
}

while (true) {
    $product = strtolower(readline());
    if($product == 'end'){
        break;
    }
    
    if($product == 'nuts'){
        if(round($sum, 2) < 2.00){
            echo 'Sorry, not enough money'.PHP_EOL;
        } else {
            $sum -= 2.00;
            echo "Purchased $product".PHP_EOL;
        }
    } elseif($product == 'water'){
        if(round($sum, 2) < 0.70){
            echo 'Sorry, not enough money'.PHP_EOL;
        } else {
            $sum -= 0.70;
            echo "Purchased $product".PHP_EOL;
        }
    } elseif($product == 'crisps'){
        if(round($sum, 2) < 1.50){
            echo 'Sorry, not enough money'.PHP_EOL;
        } else {
            $sum -= 1.50;
            echo "Purchased $product".PHP_EOL;
        }
    } elseif($product == 'soda'){
        if(round($sum, 2) < 0.80){
            echo 'Sorry, not enough money'.PHP_EOL;
        } else {
            $sum -= 0.80;
            echo "Purchased $product".PHP_EOL;
        }
    } elseif($product == 'coke'){
        if(round($sum, 2) < 1.00){
            echo 'Sorry, not enough money'.PHP_EOL;
        } else {
            $sum -= 1.00;
            echo "Purchased $product".PHP_EOL;
        }
    } else{
        echo 'Invalid product'.PHP_EOL;
    }
    
    if(round($sum, 2) < 0.00){
        echo 'Sorry, not enough money'.PHP_EOL;
    } else {
//        
    }
}

echo 'Change: '.number_format(round($sum, 2), 2, '.', '');