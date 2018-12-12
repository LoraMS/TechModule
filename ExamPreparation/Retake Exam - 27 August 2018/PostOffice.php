<?php
$line = explode('|', readline());
$capitalLetterPart = $line[0];
$wordLengthPart = $line[1];
$wordsPart = explode(' ', $line[2]);
$searchedWords = [];

$capitalLetterPattern = '/([#$%*&])(?<letters>[A-Z]+)(\1)/';
preg_match($capitalLetterPattern, $capitalLetterPart, $letterMatch);
$capitalLetter = $letterMatch['letters'];

$wordLengthPattern = '/(?<letter>65|66|67|68|69|[7-8][0-9]|90):(?<length>0[1-9]|1[1-9]|20)/';
preg_match_all($wordLengthPattern, $wordLengthPart, $lengthMatch);
$letterArr = $lengthMatch['letter'];
$lengthArr = $lengthMatch['length'];

for($i = 0; $i < strlen($capitalLetter); $i++){
    $len = '';
    $letter = $capitalLetter[$i];
    if(in_array(ord($letter), $letterArr)){
        $index = array_search(ord($letter), $letterArr);
        $len = intval($lengthArr[$index]);
    }
    foreach ($wordsPart as $word) {
        if($letter === $word[0] && strlen($word) === $len+1){
            echo $word.PHP_EOL;
        }
    }
}