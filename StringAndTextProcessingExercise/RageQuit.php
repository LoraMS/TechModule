<?php
$str = readline();
$resultStr = '';
$letters = '';
$number = '';
for($i = 0; $i < strlen($str); $i++){
    if(!is_numeric($str[$i])){
        $letters .= $str[$i];
        continue;
    }
    $letters = strtoupper($letters);

    if(is_numeric($str[$i])){
        $number .= $str[$i];
        if(is_numeric($str[$i+1])){
            $number .= $str[$i+1];
            $i++;
        }
    }
    $num = intval($number);

    $resultStr .= str_repeat($letters, $num);
    $letters = '';
    $number = '';
}

echo "Unique symbols used: ".count(array_unique(str_split($resultStr))).PHP_EOL;
echo $resultStr;