<?php
$data = explode(' ', readline());
while(true){
    $input = readline();
    if($input === '3:1'){
        break;
    }

    $line = explode(' ', $input);
    $command = $line[0];
    if($command === 'merge'){
        $start = intval($line[1]);
        $end = intval($line[2]);
        if($start < 0){
            $start = 0;
        }

        if ($start > count($data)-1) {
            continue;
        }

        if($end > count($data)-1){
            $end = count($data)-1;
        }

        if($end < 0){
            continue;
        }

        $result = '';
        for($i = $start; $i <= $end; $i++){
            $result .= $data[$i];
        }
        array_splice($data, $start, $end-$start+1);
        array_splice($data, $start, 0, $result);

    } elseif($command === 'divide') {
        $index = intval($line[1]);
        $parts = intval($line[2]);
        $element = $data[$index];
        $elementLen = strlen($data[$index]);
        $partsLen = intval($elementLen / $parts);
        $lastPartLen = $partsLen + ($elementLen % $parts);
        $result = [];
        for($i = 0; $i < $parts; $i++){
            $w = substr($element, $i*$partsLen, $partsLen);
            if ($i === $parts - 1) {
                $w = substr($element, $i*$partsLen, $lastPartLen);
            }
            $result[] =  $w;
        }

        array_splice($data, $index, 1);
        array_splice($data, $index, 0, $result);
    }
}

echo implode(' ', $data);