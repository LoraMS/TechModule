<?php
$bannedWords = explode(', ', readline());
$text = readline();
foreach ($bannedWords as $word){
    $wordLen = strlen($word);
    $replacement = str_repeat('*', $wordLen);
    for($i = 0; $i < strlen($text); $i++){
        $text = str_replace($word, $replacement, $text);
    }
}

echo $text;