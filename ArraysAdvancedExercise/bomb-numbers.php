<?php

$numbers = array_map('intval', explode(' ', readline()));
$special = array_map('intval', explode(' ', readline()));
$specialNumber = intval($special[0]);
$power = intval($special[1]);

while (in_array($specialNumber, $numbers)) {
    $index = array_search($specialNumber, $numbers);
    for ($i = $index - $power; $i <= $index + $power; $i++) {
        unset($numbers[$i]);
    }
}

echo array_sum($numbers);
