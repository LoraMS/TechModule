<?php
$customers = [];
while(true){
    $input = readline();
    if($input === 'I believe I can fly!'){
        break;
    }
    if(strpos($input, '=') === false){
        $flights = explode(' ', $input);
        $name = array_shift($flights);

        if(!key_exists($name, $customers)){
            $customers[$name] = $flights;
        } else {
            $customers[$name] = array_merge($customers[$name], $flights);
        }
    } else {
        $names = explode(' = ', $input);
        $name = $names[0];
        $nameSecond = $names[1];
        $flightsSecond = $customers[$nameSecond];
        $customers[$name] = $flightsSecond;
    }
}

uksort($customers, function ($c1, $c2) use ($customers){
    if(count($customers[$c2]) === count($customers[$c1])){
        return strcmp($c1, $c2);
    }
    return count($customers[$c2]) <=> count($customers[$c1]);
});

foreach ($customers as $customer=>$flights) {
    echo "#$customer ::: ";
    array_multisort(array_values($flights), SORT_ASC, $flights);
    echo implode(', ', $flights);
    echo PHP_EOL;
}
