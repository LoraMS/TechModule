<?php

$randomChars = readline();
$pattern = readline();

while (strlen($randomChars) > 0 && strlen($pattern) > 0){
    $firstPosition = strpos($randomChars, $pattern);
    $lastPosition = strrpos($randomChars, $pattern);

    if ($firstPosition !== false && $lastPosition !== false && $firstPosition != $lastPosition){
        echo "Shaked it.".PHP_EOL;

        $randomChars = substr_replace($randomChars, '', $firstPosition, strlen($pattern));
        $lastPosition = strrpos($randomChars, $pattern);
        $randomChars = substr_replace($randomChars, '', $lastPosition, strlen($pattern));

        $pattern = substr_replace($pattern, '',strlen($pattern) / 2, 1);
    }
    else
    {
        break;
    }
}

echo "No shake.".PHP_EOL;
echo $randomChars;