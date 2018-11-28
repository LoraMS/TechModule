<?php

$words = explode(' ', strtolower(readline()));
$occurrences = [];
for ($i = 0; $i < count($words); $i++) {
    $word = $words[$i];
    if (!key_exists($word, $occurrences)) {
        $occurrences[$word] = 1;
    } else {
        $occurrences[$word] ++;
    }
}

$result = [];
foreach ($occurrences as $key => $value) {
    if($value % 2 !== 0){
        $result[] = $key;
    }
}

echo implode(' ', $result);