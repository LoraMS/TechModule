<?php
$pattern = '/^(\d+)(?<message>[A-Za-z]+)([^A-Za-z]*)$/';
while(true){
    $input = readline();
    if($input === 'Over!'){
        break;
    }
    $len = intval(readline());
    $result = '';
    if(preg_match($pattern, $input, $match) && strlen($match['message']) === $len){
        $message = $match['message'];
        $leftSide = $match[1];
        $rightSide = $match[3];

        for($i = 0; $i < strlen($leftSide); $i++){
            if($leftSide[$i] >= strlen($message)){
                $result .= ' ';
            } else {
                $result .= $message[$leftSide[$i]];
            }
        }

        for($j = 0; $j < strlen($rightSide); $j++){
            if(is_numeric($rightSide[$j])){
                if($rightSide[$j] >= strlen($message)){
                    $result .= ' ';
                } else {
                    $result .= $message[$rightSide[$j]];
                }
            }
        }

        echo "$message == $result".PHP_EOL;
    }
}