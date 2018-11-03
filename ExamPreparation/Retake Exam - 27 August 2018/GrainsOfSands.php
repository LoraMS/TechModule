<?php
$sequence = array_map('intval', explode(' ', readline()));

while (true) {
    $input = readline();
    if ($input === 'Mort') {
        break;
    }
    $line = explode(' ', $input);
    $command = strtolower($line[0]);
    if ($command === 'add') {
        $value = intval($line[1]);
        $sequence[] = $value;
    } elseif ($command === 'remove') {
        $value = intval($line[1]);
        if (in_array($value, $sequence)) {
            $index = array_search($value, $sequence);
            array_splice($sequence, $index, 1);
        } else {
            if (0 <= $value && $value < count($sequence)) {
                // array_key_exists($value, $sequence)
                array_splice($sequence, $value, 1);
            }
        }
    } elseif ($command === 'replace') {
        $value = intval($line[1]);
        $replacement = intval($line[2]);
        if (in_array($value, $sequence)) {
            $index = array_search($value, $sequence);
            $sequence[$index] = $replacement;
        }
    } elseif ($command === 'increase') {
        $value = intval($line[1]);
        $found = false;
        $element = 0;
//        $element = array_find($sequence, function($search) use (&$value) {
//            return $search >= $value;
//        });

        for ($i = 0; $i < count($sequence); $i++) {
            if ($sequence[$i] >= $value) {
                $element = $sequence[$i];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $element = end($sequence);
        }

        $sequence = array_map(function ($el) use (&$element) {
            return $el += $element;
        }, $sequence);

    } elseif ($command === 'collapse') {
        $value = intval($line[1]);
//        for($i = 0; $i < count($sequence); $i++){
//            if($sequence[$i] < $value){
//                unset($sequence[$i]);
//                $i--;
//            }
//            $sequence = array_values($sequence);
//        }
        $sequence = array_filter($sequence, function ($el) use ($value) {
            return $el >= $value;
        });
    }
}

echo implode(' ', $sequence);

function array_find(array $a, callable $fn)
{
    foreach ($a as $key => $value) {
        if ($fn($value, $key, $a)) {
            return $value;
        }
    }
    return false;
}

function greater_than($min)
{
    return function ($item) use ($min) {
        return $item > $min;
    };
}

function less_than($max)
{
    return function ($item) use ($max) {
        return $item > $max;
    };
}

function increase_array_elements($value, $array)
{
    foreach ($array as $element) {
        $element += $value;
    }
    return $array;
}

