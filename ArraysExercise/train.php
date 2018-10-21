<?php

$wagons = intval(readline());
$people = [];
$all = 0;
for ($i = 0; $i < $wagons; $i++) {
    $people[] = intval(readline());
}

echo implode(' ', $people).PHP_EOL;
echo array_sum($people);