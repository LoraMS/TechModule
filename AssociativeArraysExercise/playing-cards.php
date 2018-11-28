<?php

$deck = [];
$value = 0;
while (true) {
    $input = readline();
    if ($input === 'JOKER') {
        break;
    }

    $line = explode(': ', $input);
    $person = $line[0];
    $cards = explode(', ', $line[1]);
    if (!key_exists($person, $deck)) {
        $deck[$person] = [];
        $deck[$person] = $cards;
    } else {
        $deck[$person] = array_merge($deck[$person], $cards);
    }

    $deck[$person] = array_unique($deck[$person]);
}

foreach ($deck as $person => $cards) {
    $value = 0;
    echo $person.': ';
    foreach ($cards as $card) {
        if (strlen($card) === 2) {
            $power = $card[0];
            $type = $card[1];
        } else {
            $power = $card[0].$card[1];
            $type = $card[2];
        }
        $typeValue = 0;
        $powerValue = 0;
        switch ($type) {
            case 'S': $typeValue = 4;
                break;
            case 'H': $typeValue = 3;
                break;
            case 'D': $typeValue = 2;
                break;
            case 'C': $typeValue = 1;
                break;
            default:
                break;
        }

        if ($power === 'J') {
            $powerValue = 11;
        } elseif ($power === 'Q') {
            $powerValue = 12;
        } elseif ($power === 'K') {
            $powerValue = 13;
        } elseif ($power === 'A') {
            $powerValue = 14;
        } else {
            $powerValue = intval($power);
        }
        $value += ($powerValue * $typeValue);
    }
    echo $value.PHP_EOL;
}
