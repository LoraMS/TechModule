<?php
$text = preg_split("/[ ,.?!]+/", readline(), null, PREG_SPLIT_NO_EMPTY);
$palindromes = [];
for($i = 0; $i < count($text); $i++){
    $reversed = strrev($text[$i]);
    if($text[$i] === $reversed){
        $palindromes[] = $text[$i];
    }
}
$palindromes = array_unique($palindromes);
natcasesort($palindromes);
echo implode(', ', $palindromes);