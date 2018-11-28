<?php
$names = readline();
$pattern = '/\b[A-Z][a-z]{1,} [A-Z][a-z]{1,}\b/';
preg_match_all($pattern, $names, $matches);

foreach ($matches as $key=>$value){
    echo implode(' ', $value);
}


//$names = explode(', ', readline());
//$pattern = '/\b[A-Z][a-z]{1,} [A-Z][a-z]{1,}\b/';
//foreach ($names as $name){
//    if(preg_match($pattern, $name)){
//        echo $name.' ';
//    }
//}