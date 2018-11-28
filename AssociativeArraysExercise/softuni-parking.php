<?php

$n = intval(readline());
$users = [];
for ($i = 0; $i < $n; $i++) {
    $line = explode(' ', readline());
    $command = $line[0];
    $name = $line[1];
    if($command === 'register'){
        $carNumber = $line[2];
        if(!key_exists($name, $users)){
            $users[$name] = $carNumber;
            echo "$name registered $carNumber successfully".PHP_EOL;
        } else {
            $carNumber = $users[$name];
            echo "ERROR: already registered with plate number $carNumber".PHP_EOL;
        }
    } elseif ($command === 'unregister') {
        if(key_exists($name, $users)){
            unset($users[$name]);
            echo "$name unregistered successfully".PHP_EOL;
        } else {
            echo "ERROR: user $name not found".PHP_EOL;
        }
    }
}

foreach ($users as $key => $value) {
    echo $key.' => '.$value.PHP_EOL;
}