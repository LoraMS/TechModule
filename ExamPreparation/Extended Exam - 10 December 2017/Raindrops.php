<?php
$regions = intval(readline());
$density = floatval(readline());
$sum = 0;

for($i = 0; $i < $regions; $i++){
    $info = array_map('intval', explode(' ', readline()));
    $raindropsCount = $info[0];
    $squareMeters = $info[1];
    $regionalCoefficient = floatval($raindropsCount / $squareMeters);
    $sum += $regionalCoefficient;
}

if($density > 0){
    $result = $sum / $density;
} else {
    $result = $sum;
}

echo sprintf('%.3f', $result);
