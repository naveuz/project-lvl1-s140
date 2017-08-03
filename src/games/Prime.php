<?php

namespace BrainGames\Prime;

use function BrainGames\Cli\run;

const GREETING = "Is it a prime number?";

function game()
{
    $getQuestion = function () {
        return rand(2, 100);
    };

    $getAnswer = function ($num) {
        return isPrime($num) ? "yes" : "no";
    };

    run(GREETING, $getQuestion, $getAnswer);
}

function isPrime($num)
{
    $iter = function ($acc) use (&$iter, $num) {
        if ($num === $acc) {
            return true;
        }
        if ($num % $acc === 0) {
            return false;
        }
        return $iter($acc + 1);
    };
    return $iter(2);
}
