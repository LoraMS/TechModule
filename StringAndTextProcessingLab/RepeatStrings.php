<?php
$text = explode(' ', readline());
for($i = 0; $i < count($text); $i++){
    $currentWordLen = strlen($text[$i]);
    $text[$i] = str_repeat($text[$i], $currentWordLen);
}

echo implode('', $text);