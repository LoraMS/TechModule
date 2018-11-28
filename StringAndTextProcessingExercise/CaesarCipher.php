<?php
$text = readline();
$resultText = '';
for($i = 0; $i < strlen($text); $i++){
    $asciiNumber = ord($text[$i]);
    $resultText .= chr($asciiNumber+3);
}
echo $resultText;