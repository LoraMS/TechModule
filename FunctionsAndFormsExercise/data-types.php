<?php

$input = readline();
$val = readline();

switch ($input) {
    case 'int': echo $val*2;
        break;
    case 'real': echo sprintf('%.2f', $val*1.5);
        break;
    case 'string': echo '$'.$val.'$';
        break;
    default:
        break;
}

