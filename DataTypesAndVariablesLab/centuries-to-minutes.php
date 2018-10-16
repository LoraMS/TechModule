<?php

$centuries = intval(readline());
$years = 100*$centuries;
$days = intval(365.2422*$years);
$hours = 24*$days;
$minutes = 60 * $hours;

echo "$centuries centuries = $years years = $days days = $hours hours = $minutes minutes";
