<?php

$num = intval(readline());

for ($i = 0; $i < $num; $i++) {
    for ($j = 0; $j < $num; $j++) {
        for ($m = 0; $m < $num; $m++) {
            echo chr(97+$i).chr(97+$j).chr(97+$m)."\n";
        }
    }
}