<?php
$userNames = explode(', ', readline());
$pattern = '/^[A-Za-z0-9-_]{3,16}$/';
for($i = 0; $i < count($userNames); $i++){
    $currentName = $userNames[$i];
    if(preg_match($pattern, $currentName)){
        echo $currentName.PHP_EOL;
    }
}