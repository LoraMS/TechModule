<?php

$num = intval(readline());
$numbers = [];

for ($i = 0; $i < $num; $i++) {
    $numbers[] = readline();
}

echo implode(' ', array_reverse($numbers));
