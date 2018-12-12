<?php
$message = readline();
$valuesInput = readline();
$valuesInput = substr($valuesInput, 1);
$valuesInput = substr($valuesInput, 0, -1);
$values = explode('}{', $valuesInput);

$messagePattern = '/([A-Za-z]+)(?<placeholder>.+)\1/';
preg_match_all($messagePattern, $message, $matches);
$placeholders = $matches['placeholder'];

$count = 0;
$decodedMessage = '';
foreach ($placeholders as $match){
    $decodedMessage = $matches[1][$count].$values[$count].$matches[1][$count];
    $message = str_replace($matches[0][$count], $decodedMessage, $message);
    $count++;
}

echo $message;