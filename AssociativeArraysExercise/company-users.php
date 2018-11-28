<?php

$companies = [];
while (true) {
    $input = readline();
    if($input === 'End'){
        break;
    }
    $line = explode(' -> ', $input);
    $companyName = $line[0];
    $employeeId = $line[1];
    if(!key_exists($companyName, $companies)){
        $companies[$companyName] = [];
    } 
    if(!in_array($employeeId, $companies[$companyName])){
        array_push($companies[$companyName], $employeeId);
    }
}

ksort($companies);

foreach ($companies as $company => $employees) {
    echo $company.PHP_EOL;
    foreach ($employees as $employee) {
        echo "-- $employee".PHP_EOL;
    }
}