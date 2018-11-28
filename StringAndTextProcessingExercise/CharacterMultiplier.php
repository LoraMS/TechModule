<?php
list($firstStr, $secondStr) = explode(' ', readline());
$sum = 0;

$firstStrLen = strlen($firstStr);
$secondStrLen = strlen($secondStr);
$minLen = min($firstStrLen, $secondStrLen);

for($i = 0; $i < $minLen; $i++){
    $sum += ord($firstStr[$i]) * ord($secondStr[$i]);
}

$restSymbols = '';
if($firstStrLen === $minLen){
    $restSymbols = substr($secondStr, $minLen);
} else {
    $restSymbols = substr($firstStr, $minLen);
}

for($i = 0; $i < strlen($restSymbols); $i++){
    $sum += ord($restSymbols[$i]);
}
echo $sum;