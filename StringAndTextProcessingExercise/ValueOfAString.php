<?php
$text = readline();
$criteria = readline();
$value = 0;
for($i = 0; $i < strlen($text); $i++){
    if($criteria === 'UPPERCASE' && ctype_upper($text[$i])){
        $value += ord($text[$i]);
    } elseif($criteria === 'LOWERCASE' && ctype_lower($text[$i])){
        $value += ord($text[$i]);
    }
}

echo "The total sum is: $value";