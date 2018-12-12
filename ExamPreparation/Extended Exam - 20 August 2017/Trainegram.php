<?php
$pattern = '/^(<\[[^A-Za-z0-9\n]*\]\.)(\.\[[A-Za-z0-9]*\]\.)*$/';
while (true){
    $text = readline();
    if($text === 'Traincode!'){
        break;
    }
    if(preg_match($pattern, $text)){
        echo $text.PHP_EOL;
    }
}