<?php

//$size = 5;
//$pascal = array(
//    array(1),
//);
//
//for ($i = 1; $i <= $size; ++$i) {
//    $prevCount = count($pascal[$i-1]);
//    for ($j = 0; $j <= $prevCount; ++$j) {
//        $pascal[$i][$j] = (
//            (isset($pascal[$i-1][$j-1]) ? $pascal[$i-1][$j-1] : 0) + 
//            (isset($pascal[$i-1][$j]) ? $pascal[$i-1][$j] : 0)
//        );
//    }
//}
//var_dump($pascal);

$size = intval(readline());
$number = [];

for ($y = 1; $y <= $size; $y ++){
  for ($x = 1; $x <= $y; $x ++){
    if($x == 1){
      $number[$y][$x] = 1; // start with 1
    }elseif($x == $y){
      $number[$y][$x] = 1; // end with 1
    }else{
      $number[$y][$x] = $number[$y-1][$x-1] + $number[$y-1][$x];
    }			
  }
}

foreach($number as $key => $nested){
    echo implode(' ', $nested) . PHP_EOL;
}