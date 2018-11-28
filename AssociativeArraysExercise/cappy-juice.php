<?php

$fruits = [];
$bottles = [];
while (true) {
    $input = readline();
    if ($input === 'End') {
        break;
    }
    $line = explode('=>', $input);
    $fruit = $line[0];
    $quantity = intval($line[1]);

    if (!key_exists($fruit, $fruits)) {
        $fruits[$fruit] = $quantity;
    } else {
        $fruits[$fruit] += $quantity;
    }

    if ($fruits[$fruit] >= 1000) {
        if (!key_exists($fruit, $bottles)) {
            $bottles[$fruit] = 0;
        }
        $bottles[$fruit] += floor($fruits[$fruit] / 1000);
        $fruits[$fruit] -= $bottles[$fruit]*1000;
    }
}

foreach ($bottles as $fruit => $count) {
    echo "$fruit=> $count".PHP_EOL;
}