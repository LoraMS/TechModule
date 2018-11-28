<?php
$sum = 0;
echo 'Bought furniture:'.PHP_EOL;
while(true){
    $furniture = readline();
    if($furniture === 'Purchase'){
        break;
    }
    $pattern = '/>>(?<name>[A-Za-z]+)+<<(?<price>\d+\.?\d+)+!(?<quantity>\d+)+\b/';
    preg_match_all($pattern, $furniture, $matches);
    for ($i = 0; $i < count($matches['name']); $i++){
        echo $matches['name'][$i].PHP_EOL;
        $sum += ($matches['price'][$i] * $matches['quantity'][$i]);
    }
}

echo 'Total money spend: '.sprintf('%0.2f', $sum);