<?php
$str = readline();
$strength = 0;
for($i = 0; $i < strlen($str); $i++){
    if($str[$i] === '>'){
        $strength += $str[$i+1];
        continue;
    }

    if($strength > 0){
        $str = substr_replace($str, '', $i, 1);;
        $i --;
        $strength --;
    }
}

echo $str;