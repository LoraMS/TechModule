<?php
$amount = floatval(readline());
$drumSet = array_map('intval', explode(' ', readline()));
$drumSetOriginal = $drumSet;

while(true){
    $input = readline();
    if($input === 'Hit it again, Gabsy!'){
        break;
    }
    $hitPower = intval($input);

    $drumSet = array_map(function($d) use (&$hitPower){
        return $d -= $hitPower;
    }, $drumSet);

    for($i = 0; $i < count($drumSet); $i++){
        $price = $drumSetOriginal[$i] * 3;
        if($drumSet[$i] <= 0){
            if($amount < $price){
                array_splice($drumSet, $i, 1);
                array_splice($drumSetOriginal, $i, 1);
                $i--;
            } else {
                $amount -= $price;
                $drumSet[$i]= $drumSetOriginal[$i];
            }
        }
    }
}

echo implode(' ', $drumSet).PHP_EOL;
echo 'Gabsy has '.sprintf('%.2f', $amount).'lv.';