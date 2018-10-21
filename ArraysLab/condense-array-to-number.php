<?php

$numbers = array_map('intval', explode(' ', readline()));

while (count($numbers) > 1) {
    $condensed = [];
    for ($i = 0; $i < count($numbers) - 1; $i++) {
        $condensed[$i] = $numbers[$i] + $numbers[$i + 1];
    }
    $numbers = $condensed;
}

echo $numbers[0];
