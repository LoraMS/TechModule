<?php
$partySize = intval(readline());
$days = intval(readline());
$coins = 0;

for ($i = 1; $i <= $days; $i++) {

    if($i % 10 === 0){
        $partySize -= 2;
    }

    if($i % 15 === 0){
        $partySize += 5;
    }

    $coins += 50;
    $coins -= 2*$partySize;

    if($i % 3 === 0){
        $coins -= 3*$partySize;
    }

    if($i % 5 === 0){
        $coins += 20*$partySize;
    }

    if($i % 3 === 0 && $i % 5 === 0){
        $coins -= 2*$partySize;
    }

}

echo "$partySize companions received ".floor($coins / $partySize)." coins each.";