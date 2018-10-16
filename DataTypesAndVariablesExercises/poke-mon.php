<?php

$poke_power = intval(readline());
$distance = intval(readline());
$exhaustionFactor = intval(readline());
$poke_targets = 0;
$half_poke_power = $poke_power * 0.5;

while ($poke_power >= $distance) {
    $poke_power -= $distance;
    $poke_targets ++;
    if ($poke_power == $half_poke_power && $exhaustionFactor > 0) {
        $poke_power = intval($poke_power / $exhaustionFactor);
    }
}

echo $poke_power.PHP_EOL;
echo $poke_targets;