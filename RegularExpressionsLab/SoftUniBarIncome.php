<?php
$orders = [];
$totalIncome = 0;
while (true){
    $line= readline();
    if($line === 'end of shift'){
        break;
    }
//    $pattern = '/\%(?<name>[A-Z][a-z]+)\%[^|$%.]*\<(?<product>[A-Za-z]+)\>[^|$%.]*\|(?<count>\d+)\|[^|$%.]*?(?<price>\d+\.?\d+)+\$/';
    $pattern = '/\%(?<name>[A-Z][a-z]+)\%[^|$%.]*\<(?<product>\w+)\>[^|$%.]*\|(?<count>\d+)\|[^|$%.]*?(?<price>\d+([.]\d+)?)\$/';
    preg_match_all($pattern, $line, $matches);
    for ($i = 0; $i < count($matches['name']); $i++){
        $income = $matches['count'][$i] * $matches['price'][$i];
        echo $matches['name'][$i].': '.$matches['product'][$i].' - '.sprintf('%0.2f', $income).PHP_EOL;
        $totalIncome += $income;
    }
}
echo 'Total income: '.sprintf('%0.2f', $totalIncome);