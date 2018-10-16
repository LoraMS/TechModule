<?php

$n = intval(readline());

for ($i = 0; $i < $n; $i++) {
    $line = readline();
    $len = strlen($line);
    $mainDigit = $line % 10;
    $offset = ($mainDigit - 2) * 3;
    if ($mainDigit === 8 || $mainDigit === 9) {
        $offset += 1;
    }
    $index = ($offset + $len - 1);
    if ($index === -6) {
        echo chr(32);
    } else {
        echo chr(97 + $index);
    }
}

