<?php
$fieldSize = intval(readline());
$ladybugsIndexes = array_map('intval', explode(' ', (readline())));
$field = [];

for($i = 0; $i < $fieldSize; $i++){
    $field[] = 0;
}

for($j = 0; $j < count($ladybugsIndexes); $j++){
    if($ladybugsIndexes[$j] >= 0 && $ladybugsIndexes[$j] < $fieldSize) {
        $field[$ladybugsIndexes[$j]] = 1;
    }
}

while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }

    $line = explode(' ', $input);
    $index = intval($line[0]);
    $direction = $line[1];
    $flyLength = $line[2];

    if($index < 0 || $index > $fieldSize - 1 || $field[$index] === 0){
        continue;
    }

    $field[$index] = 0;
    if($direction === 'right'){
        $index += $flyLength;
        while($field[$index] === 1 && $index < $fieldSize){
            $index += $flyLength;
        }

        if($index < $fieldSize){
            $field[$index] = 1;
        }
    } elseif($direction === 'left'){
        $index -= $flyLength;
        while($field[$index] === 1 && $index >= 0){
            $index -= $flyLength;
        }

        if($index >= 0){
            $field[$index] = 1;
        }
    }
}

echo implode(' ', $field);