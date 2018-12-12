<?php
$line = readline();
$currentStr = '';
$currentNumber = '';
$result = '';
for ($i = 0; $i < strlen($line); $i++) {
    if (!is_numeric($line[$i])) {
        $currentStr .= $line[$i];
        continue;
    }

    if (is_numeric($line[$i])) {
        $currentNumber .= $line[$i];
        if(is_numeric($line[$i+1])){
            $currentNumber .= $line[$i+1];
            $i++;
        }
    }

    $repeat = intval($currentNumber);
    $currentStrToUpper = strtoupper($currentStr);
    $result .= str_repeat($currentStrToUpper, $repeat);
    $currentStr = '';
    $currentNumber = 0;
}

echo "Unique symbols used: " . count(array_unique(str_split($result))) . PHP_EOL;
echo $result;