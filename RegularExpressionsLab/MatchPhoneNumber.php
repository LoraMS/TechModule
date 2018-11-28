<?php
$numbers = readline();
$pattern = '/\+359( |\-)2(\1)[0-9]{3}(\1)[0-9]{4}\b/';
preg_match_all($pattern, $numbers, $matches);
echo implode(', ', $matches[0]);