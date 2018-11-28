<?php
$quests = explode(', ', readline());
while(true){
    $input = readline();
    if($input === 'Retire!'){
        break;
    }
    $line = explode(' - ', $input);
    $command = $line[0];

    if($command === 'Start'){
        $quest = $line[1];
        if(!in_array($quest, $quests)){
            $quests[] = $quest;
        }
    } elseif($command === 'Complete'){
        $quest = $line[1];
        if(in_array($quest, $quests)){
            $index = array_search($quest, $quests);
            array_splice($quests, $index, 1);
        }
    } elseif ($command === 'Side Quest'){
        $currentLine = explode(':', $line[1]);
        $currentQuest = $currentLine[0];
        $currentSideQuest = $currentLine[1];
        if(in_array($currentQuest, $quests)){
            $index = array_search($currentQuest, $quests);
            if(!in_array($currentSideQuest, $quests)){
               array_splice($quests, $index+1, 0, $currentSideQuest);
            }
        }
    } elseif($command === 'Renew'){
        $quest = $line[1];
        if(in_array($quest, $quests)){
            $index = array_search($quest, $quests);
            array_splice($quests, $index, 1);
            $quests[] = $quest;
        }
    }
}

echo implode(', ', $quests);