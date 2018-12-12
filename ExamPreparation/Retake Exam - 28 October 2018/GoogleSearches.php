<?php

$totalDays = intval(readline());
$users = intval(readline());
$money = floatval(readline());
$totalMoney = 0;

for($i = 1; $i <= $users; $i++){
    $words = intval(readline());
    $moneyPerSearch = $money;
    if($words <= 5){
        if($words === 1){
            $moneyPerSearch *= 2;
        }

        if($i % 3 === 0){
            $moneyPerSearch *= 3;
        }

        $totalMoney += $totalDays * $moneyPerSearch;
    }
}

echo "Total money earned for $totalDays days: ".sprintf('%0.2f', $totalMoney);

