<?php
$sequence = array_map('intval', explode(' ', readline()));
$startingPosition = intval(readline());
$damage = 1;
while (true) {
    $input = readline();
    if ($input === 'Supernova') {
        break;
    }
    $line = explode(' ', $input);
    $direction = $line[0];
    $steps = intval($line[1]);

    if ($direction === 'right') {
        for ($i = 0; $i < $steps; $i++) {
            $startingPosition++;
            if ($startingPosition > count($sequence) - 1) {
                $startingPosition = 0;
                $damage++;
            }
            $sequence[$startingPosition] -= $damage;
        }

    } elseif ($direction === 'left') {
        for ($i = 0; $i < $steps; $i++) {
            $startingPosition--;
            if ($startingPosition < 0) {
                $startingPosition = count($sequence) - 1;
                $damage++;
            }
            $sequence[$startingPosition] -= $damage;
        }
    }
}
echo implode(' ', $sequence);