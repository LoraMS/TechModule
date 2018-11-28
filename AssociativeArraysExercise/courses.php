<?php

$courses = [];
while (true) {
    $input = readline();
    if($input === 'end'){
        break;
    }
    $line = explode(' : ', $input);
    $course = $line[0];
    $student = $line[1];
    if(!key_exists($course, $courses)){
        $courses[$course] = [];
    }
    
    array_push($courses[$course], $student);
}

//Variant 1
//uasort($courses, function($a, $b) { return count($b) - count($a); });
//Variant 2
//$counts = array_map(function($c) { return count($c); }, $courses);
//array_multisort($counts, SORT_DESC, $courses);
//????
//array_multisort(array_map('count', $courses), SORT_DESC, $courses);
//Variant 3
uasort($courses, function ($a, $b) {
    $a = count($a);
    $b = count($b);
    return ($a == $b) ? 0 : (($a > $b) ? -1 : 1);
});

foreach ($courses as $course => $students) {
    echo $course.': '.count($students).PHP_EOL;
    sort($students);
    foreach ($students as $student) {
        echo '-- '.$student.PHP_EOL;
    }
}
