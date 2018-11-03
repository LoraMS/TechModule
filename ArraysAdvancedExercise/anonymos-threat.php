<?php

$words = explode(' ', readline());

while (true) {
    $input = readline();
    if ($input === '3:1') {
        break;
    }

    $line = explode(' ', $input);
    $command = strtolower($line[0]);
    $len = count($words);

    if ($command === 'merge') {
        $start = intval($line[1]);
        if ($start < 0) {
            $start = 0;
        }
        if ($start > count($words)-1) {
            continue;
        }
        $end = intval($line[2]);
        if ($end > count($words) - 1) {
            $end = count($words) - 1;
        }
        if($end < 0){
            continue;
        }
        $result = '';
        for ($i = $start; $i <= $end; $i++) {
            $result .= $words[$i];
            unset($words[$i]);
        }
        array_splice($words, $start, 0, $result);
    } elseif ($command === 'divide') {   
        $index = intval($line[1]);
        $parts = intval($line[2]);
        $element = $words[$index];
        $result = [];
        $partsLen = intval(strlen($element) / $parts);
        $lastPartLen = $partsLen + strlen($element) % $parts;
        
        for ($i = 0; $i < $parts; $i++) {
            $w = substr($element, $i*$partsLen, $partsLen);
            if ($i === $parts - 1) {
                $w = substr($element, $i*$partsLen, $lastPartLen);
            }
            $result[] =  $w;
        }
        
        array_splice($words, $index, 1);
        array_splice($words, $index, 0, $result);    
    }
}

echo implode(' ', $words);
