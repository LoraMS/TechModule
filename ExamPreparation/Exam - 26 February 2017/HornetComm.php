<?php
$messages = [];
$broadcasts = [];
while (true) {
    $input = readline();
    if ($input === 'Hornet is Green') {
        break;
    }
    $line = explode(' <-> ', $input);
    $firstElement = $line[0];
    $secondElement = $line[1];

    if (preg_match('/\d+/', $firstElement) && preg_match('/^[a-zA-z0-9]+$/', $secondElement)) {
        $recipient = $firstElement;
        $message = $secondElement;
        $result = strrev($recipient) . ' -> ' . $message;
        $messages[] = $result;
    } elseif (preg_match('/\D+/', $firstElement) && preg_match('/^[a-zA-z0-9]+$/', $secondElement)) {
        $frequency = $secondElement;
        $message = $firstElement;
        for ($i = 0; $i < strlen($frequency); $i++) {
            if (ctype_lower($frequency[$i])) {
                $frequency[$i] = strtoupper($frequency[$i]);
            } elseif (ctype_upper($frequency[$i])) {
                $frequency[$i] = strtolower($frequency[$i]);
            }
        }
        $result = $frequency . ' -> ' . $message;
        $broadcasts[] = $result;
    }
}

echo 'Broadcasts:' . PHP_EOL;
if (empty($broadcasts)) {
    echo 'None' . PHP_EOL;
} else {
    foreach ($broadcasts as $item) {
        echo $item . PHP_EOL;
    }
}
echo 'Messages:' . PHP_EOL;
if (empty($messages)) {
    echo 'None' . PHP_EOL;
} else {
    foreach ($messages as $item) {
        echo $item . PHP_EOL;
    }
}
