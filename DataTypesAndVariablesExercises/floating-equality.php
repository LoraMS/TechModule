<?php

$a = floatval(readline());
$b = floatval(readline());
$epsilon = 0.000001;

if (abs($a-$b) < $epsilon) {
  echo 'True';
} else {
    echo 'False';
}

