<?php
$result = [];
while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }
    $tokens = explode(':', $input);
    $letter = $tokens[0];
    $indexes = explode('/', $tokens[1]);
    for($i = 0; $i < count($indexes); $i++){
        $currentIndex = intval($indexes[$i]);
        $result[$currentIndex] = $letter;
    }
}

ksort($result);
echo implode('', $result);