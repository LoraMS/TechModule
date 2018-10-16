<?php

$name = readline();
$password = strrev($name);
$counter = 0;

while (true) {
    $input = readline();
    if($input !== $password){
        $counter ++;
        if($counter === 4){
            echo "User $name blocked!";
            break;
        }
        echo 'Incorrect password. Try again.'.PHP_EOL;
    } else {
        echo "User $name logged in.";
        break;
    }
}
