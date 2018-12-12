<?php
$messages = [];
while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }
    $line = explode(' ', $input);
    $command = $line[0];

    if($command === 'Chat'){
        $message = $line[1];
        $messages[] = $message;
    } elseif($command === 'Delete'){
        $message = $line[1];
        if(in_array($message, $messages)){
            $index = array_search($message, $messages);
            array_splice($messages, $index, 1);
        }
    } elseif($command === 'Edit'){
        $oldMessage = $line[1];
        $newMessage = $line[2];
        if(in_array($oldMessage, $messages)){
            $index = array_search($oldMessage, $messages);
            $messages[$index] = $newMessage;
        }
    } elseif($command === 'Pin'){
        $message = $line[1];
        if(in_array($message, $messages)){
            $index = array_search($message, $messages);
            array_splice($messages, $index, 1);
            $messages[] = $message;
        }
    } elseif($command === 'Spam'){
        for($i = 1; $i < count($line); $i++){
            $message = $line[$i];
            $messages[] = $message;
        }
    }
}

foreach ($messages as $message) {
    echo $message.PHP_EOL;
}