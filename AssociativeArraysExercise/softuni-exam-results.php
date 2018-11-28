<?php

$results = [];
$submissions = [];
while (true) {
    $input = readline();
    if ($input === 'exam finished') {
        break;
    }
    $line = explode('-', $input);
    $name = $line[0];
    $language = $line[1];
    if ($language !== 'banned') {
        $points = intval($line[2]);

        if (!key_exists($name, $results)) {
            $results[$name] = $points;
        } else {
            if($results[$name] < $points){
                $results[$name] = $points;
            }
        }
        
        if (!key_exists($language, $submissions)) {
            $submissions[$language] = 1;
        } else {
            $submissions[$language] ++;
        }
    } else {
        unset($results[$name]);
        continue;
    }
}

array_multisort(array_values($results), SORT_DESC, array_keys($results), SORT_ASC, $results);
echo 'Results:' . PHP_EOL;
foreach ($results as $name => $points) {
    echo $name . ' | ' . $points . PHP_EOL;
}

array_multisort(array_values($submissions), SORT_DESC, array_keys($submissions), SORT_ASC, $submissions);
echo 'Submissions:' . PHP_EOL;
foreach ($submissions as $language => $value) {
    echo $language . ' - ' . $value . PHP_EOL;
}