<?php

$first = explode(' ', readline());
$second = explode(' ', readline());
$result = [];

for ($i = 0; $i < count($second); $i++) {
    for ($j = 0; $j < count($first); $j++) {
        if ($second[$i] === $first[$j]) {
            $result[] = $first[$j];
        }
    }
}

echo implode(' ', $result);