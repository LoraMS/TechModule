<?php

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

$num = intval(readline());

if($num > 0 && array_key_exists($num-1, $days)){
    echo $days[$num-1];
} else {
    echo 'Invalid Day!';
}

