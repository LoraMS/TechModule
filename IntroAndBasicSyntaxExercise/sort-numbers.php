<?php

$arr [] = intval(readline());
$arr [] = intval(readline());
$arr [] = intval(readline());

rsort($arr);
$arrlength = count($arr);
for($x = 0; $x < $arrlength; $x++) {
    echo $arr[$x];
    echo PHP_EOL;
}
