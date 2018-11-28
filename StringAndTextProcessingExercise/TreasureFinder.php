<?php
$keys = array_map('intval', explode(' ', readline()));
$keysLen = count($keys);
while(true){
    $input = readline();
    if($input === 'find'){
        break;
    }
    $message = '';
    for($i = 0; $i < strlen($input); $i++){
        $currentKey = $keys[$i % $keysLen];
        $currentElementAscii = ord($input[$i]);
        $newElement = $currentElementAscii - $currentKey;
        $message .= chr($newElement);
    }

    preg_match('#\&(.*?)\&#', $message, $matchTreasure);
    $treasure = $matchTreasure[1];
    preg_match('#\<(.*?)\>#', $message, $matchCoordinates);
    $coordinates = $matchCoordinates[1];
    echo "Found $treasure at $coordinates".PHP_EOL;
}