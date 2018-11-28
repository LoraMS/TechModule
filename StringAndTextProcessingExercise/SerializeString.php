<?php
$input = readline();
$strArray = str_split($input);
$strUnique = array_unique($strArray);
$strUnique = array_values($strUnique);

for($i = 0; $i < count($strUnique); $i++) {
    $positions = [];
    $currentUniqueChar = $strUnique[$i];
    for($j = 0; $j < count($strArray); $j++){
        $currentChar = $strArray[$j];
        if($currentChar === $currentUniqueChar){
            $positions[] = $j;
        }
    }
    echo "$currentUniqueChar:" . implode('/', $positions).PHP_EOL;
}
