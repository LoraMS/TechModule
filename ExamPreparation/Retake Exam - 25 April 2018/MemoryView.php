<?php

$numbers = '';
$result = [];
while(true){
    $line = readline();
    if($line === 'Visual Studio crash'){
        break;
    }

    $line .= ' ';
    $numbers .= $line;

}

$words = explode('32656 19759 32763', $numbers);
foreach ( $words as $item) {
    $word = explode(' ', $item);
    for($i = 0; $i < count($word); $i++){
        if(!empty($word[$i]) && $word[$i] > 31){
            $character = chr($word[$i]);
            echo $character;
        }
    }
    echo PHP_EOL;
}