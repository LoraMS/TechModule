<?php
$tickets = array_map("trim", explode(',', readline()));
for($i = 0; $i < count($tickets); $i++){
    $ticket = $tickets[$i];
    if(strlen($ticket) !== 20){
        echo 'invalid ticket'.PHP_EOL;
        continue;
    }

    $leftSide = substr($ticket, 0, 10);
    $rightSide = substr($ticket, 10);

    if(preg_match('/(\${20}|#{20}|@{20}|\^{20})/', $ticket)){
        echo "ticket \"$ticket\" - 10{$ticket[0]} Jackpot!".PHP_EOL;
    } elseif(preg_match('/(\${6,}|#{6,}|@{6,}|\^{6,})/', $leftSide, $matchesLeft) && preg_match('/(\${6,}|#{6,}|@{6,}|\^{6,})/', $rightSide, $matchesRight) && $matchesLeft[0][0] === $matchesRight[0][0]){
        $leftSideLen = strlen($matchesLeft[0]);
        $rightSideLen = strlen($matchesRight[0]);
        $minLen = $leftSideLen < $rightSideLen ? $leftSideLen : $rightSideLen;
        echo "ticket \"$ticket\" - $minLen{$matchesRight[0][0]}".PHP_EOL;
    } else {
        echo "ticket \"$ticket\" - no match".PHP_EOL;
    }
}