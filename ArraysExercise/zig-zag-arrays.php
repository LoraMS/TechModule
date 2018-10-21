<?php

$n = intval(readline());
$first = [];
$second = [];
for ($i = 1; $i <= $n; $i++) {
    $input = array_map('intval', explode(' ', readline()));
    if ($i % 2 !== 0) {
        $first[] = $input[0];
        $second[] = $input[1];
    } else {
        $first[] = $input[1];
        $second[] = $input[0];
    }
}

echo implode(' ', $first).PHP_EOL;
echo implode(' ', $second);