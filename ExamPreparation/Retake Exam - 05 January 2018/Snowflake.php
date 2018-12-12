<?php
$middlePattern = '/([^A-Za-z0-9]+)([\d_]+)(?<core>[A-Za-z]+)([\d_]+)([^A-Za-z0-9]+)/';
$surfacePattern = '/^[^A-Za-z0-9]+$/';
$mantlePattern = '/^[\d_]+$/';

$line1 = readline();
$line2 = readline();
$line3 = readline();
$line4 = readline();
$line5 = readline();

if(preg_match($surfacePattern, $line1) && preg_match($surfacePattern, $line5) && preg_match($mantlePattern, $line2) && preg_match($mantlePattern, $line4) && preg_match($middlePattern, $line3, $match)){
    echo 'Valid'.PHP_EOL;
    echo strlen($match['core']);
} else {
    echo 'Invalid';
}