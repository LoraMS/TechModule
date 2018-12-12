<?php
$encrypted = readline();
$pattern = '/^[d-z{}|#]+$/';
if(!preg_match($pattern, $encrypted)){
    echo "This is not the book you are looking for.";
    return;
} else {
    $decrypted = '';
    for ($i = 0; $i < strlen($encrypted); $i++) {
        $current = $encrypted[$i];
        $currentASCII = ord($current);
        $newASCII = $currentASCII - 3;
        $decrypted .= chr($newASCII);
    }

    $substrings = explode(' ', readline());
    $firstSubstring = $substrings[0];
    $secondSubstring = $substrings[1];

    $newMessage = str_replace($firstSubstring, $secondSubstring, $decrypted);
    echo $newMessage;
}