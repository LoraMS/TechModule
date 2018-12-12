<?php
$text = readline();
$didiPattern = '/[^A-Za-z-]+/';
$bojoPattern = '/[A-Za-z-]+-[A-Za-z]+/';

while (true){
    if(preg_match($didiPattern, $text, $didiMatch)){
        echo $didiMatch[0].PHP_EOL;
        $pos = strpos($text, $didiMatch[0]);
        if ($pos !== false) {
            $text = substr($text, $pos + strlen($didiMatch[0]));
        }
    } else {
        break;
    }

    if(preg_match($bojoPattern, $text, $bojoMatch)){
        echo $bojoMatch[0].PHP_EOL;
        $pos = strpos($text, $bojoMatch[0]);
        if ($pos !== false) {
            $text = substr($text, $pos + strlen($bojoMatch[0]));
        }
    } else {
        break;
    }
}