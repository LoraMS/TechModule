<?php

$shedule = explode(', ', readline());
while (true) {
    $input = readline();
    if ($input === 'course start') {
        break;
    }

    $line = explode(':', $input);
    $command = strtolower($line[0]);
    $title = $line[1];

    if ($command === 'add') {
        if (!in_array($title, $shedule)) {
            array_push($shedule, $title);
        }
    } elseif ($command === 'insert') {
        $index = intval(end($line));
        if (!in_array($title, $shedule) && $index >= 0 && $index <= count($shedule)) {
            array_splice($shedule, $index, 0, $title);
        }
    } elseif ($command === 'remove') {
        if (in_array($title, $shedule)) {
//            $remove = array($title);
//            $result = array_diff($shedule, $remove);
            $index = array_search($title, $shedule);
            array_splice($shedule, $index, 1);
            $exerciseTitle = $title . '-Exercise';
            if (in_array($exerciseTitle, $shedule)) {
                array_splice($shedule, $index, 1);
            }
        }
    } elseif ($command === 'swap') {
        $newTitle = $line[2];
        $index = array_search($title, $shedule);
        $newIndex = array_search($newTitle, $shedule);
        $exerciseTitle = $title . '-Exercise';
        $newExerciseTitle = $newTitle . '-Exercise';
        $indexExercise = array_search($exerciseTitle, $shedule);
        $newIndexExercise = array_search($newExerciseTitle, $shedule);
        if (in_array($title, $shedule) && in_array($newTitle, $shedule)) {
            list($shedule[$index], $shedule[$newIndex]) = [$shedule[$newIndex], $shedule[$index]];
            if (in_array($exerciseTitle, $shedule)) {
                array_splice($shedule, $newIndex + 1, 0, $exerciseTitle);
                array_splice($shedule, $indexExercise+1, 1);
            } elseif (in_array($newExerciseTitle, $shedule)) {
                array_splice($shedule, $index + 1, 0, $newExerciseTitle);
                array_splice($shedule, $newIndexExercise+1, 1);
            }
        }

        } elseif ($command === 'exercise') {
            $exerciseTitle = $title . '-Exercise';
            if (in_array($title, $shedule) && !in_array($exerciseTitle, $shedule)) {
                $index = array_search($title, $shedule);
                array_splice($shedule, $index + 1, 0, $exerciseTitle);
            } else {
                array_push($shedule, $title);
                array_push($shedule, $exerciseTitle);
            }
        }
    }

    foreach ($shedule as $key => $item) {
        $index = $key + 1;
        echo "$index.$item" . PHP_EOL;
    }



