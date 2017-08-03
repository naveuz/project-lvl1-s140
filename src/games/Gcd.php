<?php

namespace BrainGames\Gcd;

use function BrainGames\Cli\run;

const GREETING = "Find the greatest common divisor of given numbers.";

function game()
{
    $getQuestion = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        return "{$num1} {$num2}";
    };

    $getAnswer = function ($str) {
        $arr = explode(" ", $str);
        $num1 = $arr[0];
        $num2 = $arr[1];
        return gcd($num1, $num2);
    };

    run(GREETING, $getQuestion, $getAnswer);
}

function gcd($num1, $num2)
{
    $min = min($num1, $num2);
    $max = max($num1, $num2);
    if ($min === $max || $min === 0) {
        return $max;
    }
    $iter = function ($acc) use (&$iter, $max, $min) {
        if ($max % $acc === 0 & $min % $acc === 0) {
            return $acc;
        }
        return $iter($acc - 1);
    };
    return $iter($min);
}
