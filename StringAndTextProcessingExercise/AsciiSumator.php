<?php
$firstCharAscii = ord(readline());
$secondCharAscii = ord(readline());
$str = readline();
$start = 0;
$end = 0;
$sum = 0;

if($firstCharAscii < $secondCharAscii){
    $start = $firstCharAscii;
    $end = $secondCharAscii;
} else {
    $start = $secondCharAscii;
    $end = $firstCharAscii;
}

for($i = 0; $i < strlen($str); $i++){
    $current = ord($str[$i]);
    if($current > $start && $current < $end){
        $sum += $current;
    }
}
echo $sum;
