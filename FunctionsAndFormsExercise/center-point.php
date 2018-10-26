<?php

$x1 = readline();
$y1 = readline();
$x2 = readline();
$y2 = readline();

findCenterPoint($x1, $y1, $x2, $y2);

function findCenterPoint($x1, $y1, $x2, $y2) {
    if (sqrt(pow($x1, 2) + pow($y1, 2)) < sqrt(pow($x2, 2) + pow($y2, 2))) {
        echo "($x1, $y1)";
    } else {
        echo "($x2, $y2)";
    }
}
