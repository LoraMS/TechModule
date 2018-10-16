<?php

$pounds = floatval(readline());
$course = 1.31;
$dollars = $pounds * $course;

echo number_format($dollars, 3, '.', '');
