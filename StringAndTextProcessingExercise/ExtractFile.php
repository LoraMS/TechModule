<?php
$path = trim(readline());
$startIndexFile = strrpos($path, '\\') + 1;
$file = substr($path, $startIndexFile);
$startIndexExtension = strrpos($file, '.') + 1;
$name = substr($file, 0, $startIndexExtension - 1);
$extension = substr($file, $startIndexExtension);
echo "File name: $name".PHP_EOL;
echo "File extension: $extension".PHP_EOL;
