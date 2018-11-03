<?php

$distances = array_map('intval', explode(' ', readline()));
$removed = [];
while (count($distances) > 0) {
    $index = intval(readline());
    if ($index < 0) {
        $first = array_shift($distances);
        array_unshift($distances, $distances[count($distances) - 1]);
        $removed[] = $first;
        for ($i = 0; $i < count($distances); $i++) {
        if ($distances[$i] <= $first) {
            $distances[$i] += $first;
        } else {
            $distances[$i] -= $first;
        }
    }
    } elseif ($index > count($distances) - 1) {
        $last = array_pop($distances);
        array_push($distances, $distances[0]);
        $removed[] = $last;
        for ($i = 0; $i < count($distances); $i++) {
        if ($distances[$i] <= $last) {
            $distances[$i] += $last;
        } else {
            $distances[$i] -= $last;
        }
    }
    } else {
        $value = $distances[$index];
        $removed[] = $value;
        array_splice($distances, $index, 1);
        for ($i = 0; $i < count($distances); $i++) {
            if ($distances[$i] <= $value) {
                $distances[$i] += $value;
            } else {
                $distances[$i] -= $value;
            }
        }
    }
}

echo array_sum($removed);

