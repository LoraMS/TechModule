<?php

$balance = floatval(readline());
$price = 0;
$spent = 0;

while (true) {
    $game = readline();
    if ($game === 'Game Time') {
        break;
    }

    if ($game === 'OutFall 4') {
        $price = 39.99;
    } elseif ($game === 'CS: OG') {
        $price = 15.99;
    } elseif ($game === 'Zplinter Zell') {
        $price = 19.99;
    } elseif ($game === 'Honored 2') {
        $price = 59.99;
    } elseif ($game === 'RoverWatch') {
        $price = 29.99;
    } elseif ($game === 'RoverWatch Origins Edition') {
        $price = 39.99;
    } else {
        echo 'Not Found'.PHP_EOL;
        continue;
    }
    
    if($balance === $price){
        echo "Bought $game\n";
        echo 'Out of money!';
        return;
    }
    
    if ($balance > $price && $price > 0) {
        $balance -= $price;
        $spent += $price;
        echo "Bought $game\n";
    } else{
        echo 'Too Expensive'.PHP_EOL;
    }
}

echo "Total spent: $". number_format($spent, 2, '.', '').". Remaining: $". number_format($balance, 2, '.', '');