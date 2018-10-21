<?php

$numbers = array_map('floatval', explode(' ', readline()));

foreach ($numbers as $value) {
    echo number_format($value, 2)." => ".intval(round($value, 0, PHP_ROUND_HALF_UP)).PHP_EOL;
}


// 0.9 1.5 2.4 2.5 3.14
/*
0.90 => 1
1.50 => 2
2.40 => 2
2.50 => 3
3.14 => 3

 */
// -5.01 -1.599 -2.5 -1.50 0
/*
-5.01 => -5
-1.60 => -2
-2.50 => -3
-1.50 => -2
0.00 => 0

 */