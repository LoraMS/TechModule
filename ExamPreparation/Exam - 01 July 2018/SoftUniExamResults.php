<?php
$students = [];
$submissions = [];
while(true){
   $line = readline();
   if($line === 'exam finished'){
       break;
   }
   $exam = explode('-', $line);
   $name = $exam[0];
   $language = $exam[1];
   if($language !== 'banned'){
       $points = intval($exam[2]);
       if(!key_exists($name, $students)){
           $students[$name] = $points;
       } else {
           if($students[$name] < $points){
               $students[$name] = $points;
           }
       }

       if(!key_exists($language, $submissions)){
           $submissions[$language] = 1;
       } else {
           $submissions[$language] += 1;
       }
   } else {
        unset($students[$name]);
        continue;
   }
}

uksort($students, function ($student1, $student2) use ($students){
    if($students[$student2] === $students[$student1]){
        return strcmp($student1, $student2);
    }
    return $students[$student2] <=> $students[$student1];
});

uksort($submissions, function ($submission1, $submission2) use ($submissions){
    if($submissions[$submission1] === $submissions[$submission2]){
        return strcmp($submission1, $submission2);
    }
    return $submissions[$submission2] <=> $submissions[$submission1];
});

echo 'Results:'.PHP_EOL;
foreach ($students as $name=>$points) {
    echo "$name | $points".PHP_EOL;
}

echo 'Submissions:'.PHP_EOL;
foreach ($submissions as $language=>$count) {
    echo "$language - $count".PHP_EOL;
}
