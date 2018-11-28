<?php
$text = readline();
$pattern = '/(^|(?<=\s))([a-z0-9]+)([._-][a-z0-9]+)?@([a-z]+)([\.-][a-z]+)*\.[a-z]+($|(?=))/';
// /[a-z0-9]+([-.]\w*)*@[a-z]{1,}([-.]\w*)*(\.[a-z]{1,})/;
// /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi
preg_match_all($pattern, $text, $matches);
echo implode(PHP_EOL, $matches[0]).PHP_EOL;
