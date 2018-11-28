<?php
$health = 100;
$coins = 0;
$alive = true;
$rooms = explode('|', readline());

for ($i = 0; $i < count($rooms); $i++) {
    $currentRoom = explode(' ', $rooms[$i]);
    $itemOrMonster = $currentRoom[0];
    $number = $currentRoom[1];

    if($itemOrMonster === 'potion') {
        $currentHealth = $health;
        $health += $number;
        if($health >= 100){
            echo "You healed for ".(100-$currentHealth)." hp.".PHP_EOL;
            $health = 100;
        } else {
            echo "You healed for $number hp.".PHP_EOL;
        }
        echo "Current health: $health hp.".PHP_EOL;
    } elseif($itemOrMonster === 'chest') {
        $coins += $number;
        echo "You found $number coins.".PHP_EOL;
    } else {
        if($health - $number > 0) {
            $health -= $number;
            echo "You slayed $itemOrMonster.".PHP_EOL;
        } else {
            echo "You died! Killed by $itemOrMonster.".PHP_EOL;
            echo "Best room: ".($i + 1);
            $alive = false;
            return;
        }
    }
}

if($alive){
    echo "You've made it!".PHP_EOL;
    echo "Coins: $coins".PHP_EOL;
    echo "Health: $health";
}