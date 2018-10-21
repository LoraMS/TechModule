<?php

// 88/100 Time limit
// 
//$num = readline();
//echo fib($num);
//
// function fib($num){ 
//    if ($num <= 1) {
//        return $num;  
//    } else{
//        return (fib($num-1) +  fib($num-2)); 
//    }
//} 



// 100/100 but without recursion 

function fib( $n) { 
    $f = array(); 
    $i; 
      
    $f[0] = 0; 
    $f[1] = 1; 
      
    for ($i = 2; $i <= $n; $i++) { 
        $f[$i] = $f[$i-1] + $f[$i-2]; 
    } 
      
    return $f[$n]; 
} 
  
$n = readline(); 
echo fib($n);  
