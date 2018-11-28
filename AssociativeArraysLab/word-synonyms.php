<?php

$n = intval(readline());
$words = [];
$synonyms = [];
$result = [];
for ($i = 0; $i < 2 * $n; $i++) {
    $item = readline();
    if ($i % 2 === 0) {
        $words[] = $item;
    } else {
        $synonyms[] = $item;
    }
}


for ($j = 0; $j < count($synonyms); $j++) {
    $word = $words[$j];
    if (!key_exists($word, $result)) {
        $result[$word] = [];
    }

    array_push($result[$word], $synonyms[$j]);
}

uksort($result, function($key1, $key2) use ($result){
    $countSynonyms1 = count($result[$key1]);
    $countSynonyms2 = count($result[$key2]);
    if($countSynonyms1 === $countSynonyms2){
        return $key1 <=> $key2;
    }
    return $countSynonyms2 <=> $countSynonyms1;
});

foreach ($result as $key => $value) {
    echo $key . " - " . implode(', ', $value) . PHP_EOL;
}
