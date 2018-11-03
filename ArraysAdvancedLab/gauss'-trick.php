<?php

$array = array_map('intval', explode(' ', readline()));

for ($i = 0; $i < count($array)-1; $i++) {
        $array[$i] += end($array);
        array_pop($array);
}
echo implode(' ', $array);



