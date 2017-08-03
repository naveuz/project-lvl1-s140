<?php

namespace BrainGames\Balance;

use function BrainGames\Cli\run;

const GREETING = "Balance the given number.";

function game()
{
    $getQuestion = function () {
        return rand(100, 10000);
    };

    $getAnswer = function ($num) {
        return balance($num);
    };

    run(GREETING, $getQuestion, $getAnswer);
}

function balance($num)
{
    $arr = array_map(function ($el) {
        return (int)$el;
    }, str_split((string)$num));

    $min = min($arr);
    $max = max($arr);
    
    if ($max - $min > 1) {
        $arr[array_search($min, $arr)] += 1;
        $arr[array_search($max, $arr)] -= 1;
        return balance((int)join('', $arr));
    }
    sort($arr);
    return (int)join('', $arr);
}
