<?php

$n = intval(readline());
$studentsList = [];
for ($i = 0; $i < $n; $i++) {
    $name = readline();
    $grade = floatval(readline());
    if(!key_exists($name, $studentsList)){
        $studentsList[$name] = $grade;
    } else {
        $prevGrade = $studentsList[$name];
        $averageGrade = ($prevGrade + $grade)/2;
        $studentsList[$name] = $averageGrade;
    }
}

arsort($studentsList);

$result = array_filter($studentsList, function($s){
    return $s >= 4.50;
});

foreach ($result as $key => $value) {
    echo "$key -> ". sprintf('%0.2f', $value).PHP_EOL;
}