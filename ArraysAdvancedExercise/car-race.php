<?php

$array = array_map('intval', explode(' ', readline()));
$firstCarTime = 0;
$secondCarTime = 0;
for ($i = 0; $i < intval(count($array) / 2); $i++) {
    if ($array[$i] === 0) {
        $firstCarTime *= 0.8;
    } else {
        $firstCarTime += $array[$i];
    }
}

for ($j = count($array) - 1; $j > intval(count($array) / 2); $j--) {
    if ($array[$j] === 0) {
        $secondCarTime *= 0.8;
    } else {
        $secondCarTime += $array[$j];
    }
}

if ($firstCarTime < $secondCarTime) {
    echo "The winner is left with total time: $firstCarTime";
} else {
    echo "The winner is right with total time: $secondCarTime";
}
