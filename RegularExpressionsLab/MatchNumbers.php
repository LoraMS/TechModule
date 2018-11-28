<?php
$numbers = readline();
$pattern = '/(^|(?<=\s))-?\d+(\.\d+)?($|(?=\s))/m';
preg_match_all($pattern, $numbers, $matches);
echo implode(' ', $matches[0]);