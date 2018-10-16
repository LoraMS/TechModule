<?php

while (true) {
    $input = readline();
    if ($input == 'END') {
        break;
    }

   if (filter_var($input, FILTER_VALIDATE_INT)) {
        echo "$input is integer type\n";
    } elseif (filter_var($input, FILTER_VALIDATE_FLOAT)) {
        echo "$input is floating point type\n";
    } elseif (filter_var(strtolower($input), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) || strtolower($input) === 'false') {
        echo "$input is boolean type\n";
    } elseif(strlen($input) == 1){
        echo "$input is character type\n";
    } else {
        echo "$input is string type\n";
    }
}
