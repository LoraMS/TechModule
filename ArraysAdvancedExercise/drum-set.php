<?php

$savings = floatval(readline());
$drumSetQuality = array_map('intval', explode(' ', readline()));
$original = $drumSetQuality;

while (true){
    $input = readline();
    if($input === "Hit it again, Gabsy!"){
        break;
    }
    $hitPower = intval($input);
    
    $drumSetQuality = array_map(function($d) use ($hitPower){
        return $d - $hitPower;
    }, $drumSetQuality);
    
    for ($i = 0; $i < count($drumSetQuality); $i++) {
        if($drumSetQuality[$i] <= 0){
            $drumSetQuality[$i] = $original[$i];
            
            if ($savings - ($original[$i] * 3) <= 0) {
//                unset($drumSetQuality[$i]);
                    array_splice($drumSetQuality, $i, 1);
                    array_splice($original, $i, 1);           
            } else {
                $savings -= $original[$i] * 3;
            }
        }
    }
}

echo implode(' ', $drumSetQuality).PHP_EOL;
echo 'Gabsy has '. sprintf('%.2f', $savings).'lv.';