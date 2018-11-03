<?php

$line = array_map('intval', explode(' ', readline()));

while(count($line) > 1){
    $len = count($line);
    $elementsToRemove = [];
    for($i = 0; $i <= $len-1; $i++){
        $attacker = $i;
        $target = $line[$i] % $len;

        if($len - count($elementsToRemove) == 1){
            break;
        }

        if($line[$i] == -1){
            continue;
        }

        $diff = abs($attacker - $target);
        if ($attacker === $target){
            $line[$attacker] = -1;
            $elementsToRemove[] = $line[$attacker];
            echo "$attacker performed harakiri".PHP_EOL;
        } elseif($diff % 2 == 0){
            $line[$target] = -1;
            $elementsToRemove[] = $line[$target];
            echo "$attacker x $target -> $attacker wins".PHP_EOL;
        } elseif ($diff % 2 != 0){
            $line[$attacker] = -1;
            $elementsToRemove[] = $line[$attacker];
            echo "$attacker x $target -> $target wins".PHP_EOL;
        }
    }

    $line = array_filter($line, function ($n){
        return $n > -1;
    });
}


/*
 // Snowman

import java.util.Arrays;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);
        int[] snowmen = Arrays.stream(sc.nextLine().split(" "))
                .mapToInt(Integer::parseInt)
                .toArray();

        while (snowmen.length > 1) {
            int alive = snowmen.length;
            for (int attackerIndex = 0; attackerIndex < snowmen.length && alive > 1; attackerIndex++) {
                int attackerValue = snowmen[attackerIndex];
                if (attackerValue == -1) {
                    continue;
                }

                int targetIndex = attackerValue % snowmen.length;
                if (targetIndex == attackerIndex) {
                    System.out.printf("%d performed harakiri%n", attackerIndex);
                    snowmen[targetIndex] = -1;
                    alive--;
                    continue;
                }


                int difference = Math.abs(attackerIndex - targetIndex);
                System.out.printf("%d x %d -> ", attackerIndex, targetIndex);
                if (difference % 2 == 0) {
                    System.out.printf("%d wins%n", attackerIndex);
                    if (snowmen[targetIndex] == -1) {
                        continue;
                    }
                    snowmen[targetIndex] = -1;
                    alive--;
                } else {
                    System.out.printf("%d wins%n", targetIndex);
                    if (snowmen[attackerIndex] == -1) {
                        continue;
                    }
                    snowmen[attackerIndex] = -1;
                    alive--;
                }
            }
            if (alive <= 1) {
                break;
            }
            int[] aliveSnowmen = new int[alive];
            int next = 0;
            for (int i = 0; i < snowmen.length; i++) {
                if (snowmen[i] != -1) {
                    aliveSnowmen[next] = snowmen[i];
                    next++;
                }
            }
            snowmen = aliveSnowmen;
        }

    }
}
 */