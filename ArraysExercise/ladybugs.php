<?php

$size = intval(readline());
$indexes = explode(' ', readline());
$field = array_fill(0, $size, 0);

for ($i = 0; $i < count($indexes); $i++) {
    $index = intval($indexes[$i]);
    if ($index >= 0 && $index < $size) {
        $field[$index] = 1;
    }
}

while (true) {
    $input = readline();
    if ($input === 'end') {
        break;
    }

    $commandLine = explode(' ', $input);
    $position = intval($commandLine[0]);
    $direction = $commandLine[1];
    $flyLength = intval($commandLine[2]);

    if ($position < 0 || $position > $size - 1 || $field[$position] === 0) {
        continue;
    }

    $field[$position] = 0;
    if($direction === 'right'){
        $position += $flyLength;
        while ($position < $size && $field[$position] === 1) {
            $position += $flyLength;
        }
        
        if($position < $size){
            $field[$position] = 1;
        }
    } else {
        $position -= $flyLength;
        while ($position >= 0 && $field[$position] === 1) {
            $position -= $flyLength;
        }
        
        if($position >= 0){
            $field[$position] = 1;
        }
    }
}

echo implode(' ', $field);
