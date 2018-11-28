<?php
$pattern = '/\b(?<day>\d{2})([.\-\/])(?<month>[A-z][a-z]{2})\2(?<year>\d{4})\b/';
$dates = readline();
preg_match_all($pattern, $dates, $matches);
for($i = 0; $i < count($matches['day']); $i++){
    echo "Day: {$matches['day'][$i]}, Month: {$matches['month'][$i]}, Year: {$matches['year'][$i]}".PHP_EOL;
}