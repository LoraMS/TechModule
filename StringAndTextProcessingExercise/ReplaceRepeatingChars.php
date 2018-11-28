<?php
$text = readline();
for($i = 0; $i < strlen($text)-1; $i++){
    if($text[$i] === $text[$i+1]){
        $text = substr_replace($text, '', $i, 1);
        $i--;
    }
}
echo $text;