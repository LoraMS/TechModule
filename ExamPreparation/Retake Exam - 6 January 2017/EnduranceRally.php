<?php
$names = explode(' ', readline());
$track = array_map('floatval', explode(' ', readline()));
$checkpoint = array_map('intval', explode(' ', readline()));

foreach ($names as $name) {
    $fuel = ord($name[0]);

    $index = 0;
    while ($index < count($track) && $fuel > 0){
        if(in_array($index, $checkpoint)){
            $fuel += $track[$index];
        } else {
            $fuel -= $track[$index];
        }

        $index ++;
    }

    if($fuel > 0){
        echo "$name - fuel left ".sprintf('%0.2f', $fuel).PHP_EOL;
    } else {
        echo "$name - reached ".($index-1).PHP_EOL;
    }
}