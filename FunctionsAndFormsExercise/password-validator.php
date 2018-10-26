<?php

$password = readline();
$result = [];

$result[] = checkPasswordLength($password);
$result[] = checkPasswordContent($password);
$result[] = checkPasswordDigitsCount($password);

$result = array_filter($result);

if(empty($result)){
    echo 'Password is valid';
} else {
    echo implode("\n", $result);
}
 
function checkPasswordLength($password){
    $len = strlen($password);
    if($len < 6 || $len > 11){
        return 'Password must be between 6 and 10 characters';
    }
}

function checkPasswordContent($password){
    if (!preg_match('/^[a-zA-Z0-9]+$/',$password)) {
        return 'Password must consist only of letters and digits';
    }
}

function checkPasswordDigitsCount($password){
    if (!preg_match('/[0-9]{2}/',$password)) {
        return 'Password must have at least 2 digits';
    }
}
