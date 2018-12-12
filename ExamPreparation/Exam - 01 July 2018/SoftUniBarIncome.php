<?php
$pattern = '/\%(?<name>[A-Z][a-z]+)\%[^|$%.]*\<(?<product>\w+)\>[^|$%.]*\|(?<quantity>[0-9]+)\|[^|$%.]*?(?<price>\d+([.]\d+)?)\$/';
$totalIncome = 0;
while (true) {
    $line = readline();
    if ($line === 'end of shift') {
        break;
    }
    if (preg_match($pattern, $line, $match)) {
        $name = $match['name'];
        $product = $match['product'];
        $quantity = intval($match['quantity']);
        $price = floatval($match['price']);
        $income = $quantity * $price;
        $totalIncome += $income;
        echo "$name: $product - " . sprintf('%0.2f', $income) . PHP_EOL;
    }
}

echo 'Total income: ' . sprintf('%0.2f', $totalIncome);