<?php

$collection = [];
while (true) {
    $color = readline();
    if ($color === 'stop') {
        break;
    }
    $karats = intval(readline());
    if (!key_exists($color, $collection)) {
        $collection[$color] = $karats;
    } else {
        $collection[$color] += $karats;
    }
}

foreach ($collection as $key => $value) {
    echo "$key -> $value" . 'K' . PHP_EOL;
}

