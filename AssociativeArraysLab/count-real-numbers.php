<?php

$arr = explode(' ', readline());
$result = [];

for ($i = 0; $i < count($arr); $i++) {
    $element = $arr[$i];
    if (!key_exists($element, $result)) {
        $result[$element] = 1;
    } else {
        $result[$element] ++;
    }
}
ksort($result);
foreach ($result as $key => $value) {
    echo "$key -> $value" . PHP_EOL;
}