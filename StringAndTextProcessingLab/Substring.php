<?php
$occurrences = readline();
$text = readline();
while(true){
    if(strpos($text, $occurrences) === false){
        break;
    }
    $text = str_replace($occurrences, '', $text);
}
echo $text;


/*
$occurrences = readline();
$text = readline();
while(true) {
    $old = $text;
    $text = str_replace($occurrences,'',$text);
    if($old == $text) {
        echo $text;
        break;
    }
}
*/