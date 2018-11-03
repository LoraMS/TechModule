<?php

$schedule = explode(', ', readline());

while (true) {
    $input = readline();
    if ($input === 'course start') {
        break;
    }

    $line = explode(':', $input);
    $command = $line[0];
    $title = $line[1];
    if ($command === 'Add') {
        if (!in_array($title, $schedule)) {
            $schedule[] = $title;
        }
    } elseif ($command === 'Insert') {
        $index = intval($line[2]);
        if (!in_array($title, $schedule)) {
            array_splice($schedule, $index, 0, $title);
        }
    } elseif ($command === 'Remove') {
        if (in_array($title, $schedule)) {
            $index = array_search($title, $schedule);
            array_splice($schedule, $index, 1);
        }

        if (in_array($title . '-Exercise', $schedule)) {
            $indexE = array_search($title . '-Exercise', $schedule);
            array_splice($schedule, $indexE, 1);
        }
    } elseif ($command === 'Swap') {
        $titleTwo = $line[2];
        if (in_array($title, $schedule) && in_array($titleTwo, $schedule)) {
            $index = array_search($title, $schedule);
            $indexTwo = array_search($titleTwo, $schedule);
            array_splice($schedule, $index, 1);
            array_splice($schedule, $index, 0, $titleTwo);
            array_splice($schedule, $indexTwo, 1);
            array_splice($schedule, $indexTwo, 0, $title);
            
            
            if (in_array($title . '-Exercise', $schedule)) {
                $indexE = array_search($title.'-Exercise', $schedule);
                array_splice($schedule, $indexE, 1);
                $indexL = array_search($title, $schedule);
                array_splice($schedule, $indexL + 1, 0, $title . '-Exercise');
            }
            if (in_array($titleTwo . '-Exercise', $schedule)) {               
                $indexE = array_search($titleTwo.'-Exercise', $schedule);
                array_splice($schedule, $indexE, 1);
                $indexL = array_search($titleTwo, $schedule);
                array_splice($schedule, $indexL + 1, 0, $titleTwo . '-Exercise');
            }
        }
    } elseif ($command === 'Exercise') {
        if (in_array($title, $schedule) && !in_array($title . '-Exercise', $schedule)) {
            $index = array_search($title, $schedule);
            array_splice($schedule, $index + 1, 0, $title . '-Exercise');
        } elseif (!in_array($title, $schedule)) {
            $schedule[] = $title;
            $schedule[] = $title . '-Exercise';
        }
    }
}

for ($i = 0; $i < count($schedule); $i++) {
    echo ($i + 1) . ".$schedule[$i]" . PHP_EOL;
}
