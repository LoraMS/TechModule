<?php
$wordsAndDefinitions = explode(' | ', readline());
$dictionary = [];

for ($i = 0; $i < count($wordsAndDefinitions); $i++) {
    $current = explode(': ', $wordsAndDefinitions[$i]);
    $word = $current[0];
    $definition = $current[1];
    if (!key_exists($word, $dictionary)) {
        $dictionary[$word] = [];
    }
    $dictionary[$word][] = $definition;
}

$words = explode(' | ', readline());

foreach ($words as $word) {
    if (key_exists($word, $dictionary)) {
        echo $word . PHP_EOL;
        usort($dictionary[$word], function ($d1, $d2) {
            return strlen($d2) <=> strlen($d1);
        });
        foreach ($dictionary[$word] as $definition) {
            echo "  -$definition" . PHP_EOL;
        }
    }
}

$command = readline();
if($command === 'List'){
    uksort($dictionary, function ($word1, $word2){
        return strcmp($word1, $word2);
    });
    foreach ($dictionary as $word=>$item) {
        echo $word.' ';
    }
} elseif($command === 'End'){
    return;
}