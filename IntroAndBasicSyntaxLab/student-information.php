<?php

$name = readline();
$age = intval(readline());
$grade = floatval(readline());

echo "Name: $name, Age: $age, Grade: " . number_format($grade, 2, '.', '');

