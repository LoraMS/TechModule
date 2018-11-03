<?php

$currentEnergy = 100;
$currentCoins = 100;

$events = explode('|', readline());
for ($i = 0; $i < count($events); $i++) {
    $line = explode('-', $events[$i]);
    $command = $line[0];
    if ($command === 'rest') {
        $gainedEnergy = $line[1];
        $currentEnergy += $gainedEnergy;
        if ($currentEnergy > 100) {
            $gainedEnergy = 0;
            $currentEnergy = 100;
        }
        echo "You gained $gainedEnergy energy." . PHP_EOL;
        echo "Current energy: $currentEnergy." . PHP_EOL;
    } elseif ($command === 'order') {
        $earnedCoins = $line[1];
        if($currentEnergy - 30 >= 0){
            $currentEnergy -= 30;
            $currentCoins += $earnedCoins;
            echo "You earned $earnedCoins coins.".PHP_EOL;
        } else {
            $currentEnergy += 50;
            echo "You had to rest!".PHP_EOL;
            continue;
        }
    } else {
        $spentCoins = $line[1];
        $currentCoins -= $spentCoins;
        if ($currentCoins <= 0) {
            echo "Closed! Cannot afford $command." ;
            return;
        } else {
            echo "You bought $command.".PHP_EOL;
        }
    }
}

echo "Day completed!".PHP_EOL;
echo "Coins: $currentCoins".PHP_EOL;
echo "Energy: $currentEnergy";