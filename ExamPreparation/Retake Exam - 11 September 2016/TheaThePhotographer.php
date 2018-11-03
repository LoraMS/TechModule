<?php
$pictures = intval(readline());
$filterTime = intval(readline());
$filterFactor = intval(readline());
$uploadTime = intval(readline());

$usefulPictures = ceil($pictures * ($filterFactor/100));
$totalTimeFilter = $pictures * $filterTime;
$totalTimeUpload = $usefulPictures * $uploadTime;
$totalTime = $totalTimeFilter + $totalTimeUpload;


//echo gmdate('d:H:i:s', $totalTime);


//$days = floor($totalTime / (60 * 60 * 24));
//$totalTime -= $days * (60 * 60 * 24);
//
//$hours = floor($totalTime / (60 * 60));
//$totalTime -= $hours * (60 * 60);
//
//$minutes = floor($totalTime / 60);
//$totalTime -= $minutes * 60;
//
//$seconds = floor($totalTime);
//$totalTime -= $seconds;
//
//echo "{$days}:{$hours}:{$minutes}:{$seconds}";


echo sprintf('%d:%02d:%02d:%02d', $totalTime/86400, $totalTime/3600%24, $totalTime/60%60, $totalTime%60);
