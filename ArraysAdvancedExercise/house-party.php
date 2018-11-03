<?php

$commandsCount = intval(readline());
$guests = [];

for ($i = 0; $i < $commandsCount; $i++) {
    $msg = explode(' ', readline());
    $name = $msg[0];
    if(in_array('not', $msg)){
        if(in_array($name, $guests)){
            $index = array_search($name, $guests);
            unset($guests[$index]);
        } else{
            echo $name.' is not in the list!'.PHP_EOL;
        }
    } else {
        if(in_array($name, $guests)){
            echo $name.' is already in the list!'.PHP_EOL;
        } else{
            $guests[] = $name;
        }
    }
}

foreach ($guests as $guest) {
    echo $guest.PHP_EOL;
}