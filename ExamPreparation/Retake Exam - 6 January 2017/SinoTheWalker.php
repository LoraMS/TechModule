<?php
$timeLeave = explode(':',readline());
$steps = intval(readline());
$secondsForStep = intval(readline());

$hours = $timeLeave[0];
$minutes = $timeLeave[1];
$seconds = $timeLeave[2];

$timeLeaveInSeconds = $hours * 3600 + $minutes * 60 + $seconds;
$timeForWalk = $steps * $secondsForStep;
$timeArriveInSeconds = $timeLeaveInSeconds + $timeForWalk;
$f = ':';

echo 'Time Arrival: '.gmdate('H:i:s', $timeArriveInSeconds);
//sprintf("%02d%s%02d%s%02d", floor($timeArriveInSeconds/3600), $f, ($timeArriveInSeconds/60)%60, $f, $timeArriveInSeconds%60);
