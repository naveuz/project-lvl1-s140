<?php

namespace BrainGames\Even;

use function BrainGames\Cli\run;

function game()
{
    $greeting = "Answer 'yes' if number even otherwise answer 'no'.";

    $getQuestion = function () {
        return rand(1, 100);
    };

    $getAnswer = function ($number) {
        return isEven($number) ? 'yes' : 'no';
    };

    run($greeting, $getQuestion, $getAnswer);
}

function isEven($num)
{
    return $num % 2 === 0;
}
