<?php
$studentsPerHourFirst = intval(readline());
$studentsPerHourSecond = intval(readline());
$studentsPerHourThird = intval(readline());
$students = intval(readline());
$studentsPerHourAll = $studentsPerHourFirst + $studentsPerHourSecond + $studentsPerHourThird;

$hours = 0;
while($students > 0){
    $students -= $studentsPerHourAll;
    $hours ++;
    if($hours %4 === 0){
        $hours ++;
    }
}

echo "Time needed: ".$hours."h.";