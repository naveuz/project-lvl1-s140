<?php

namespace BrainGames\Even;

use function BrainGames\Cli\run;

const GREETING = "Answer 'yes' if number even otherwise answer 'no'.";

function game()
{
    $getQuestion = function () {
        return rand(1, 100);
    };

    $getAnswer = function ($number) {
        return isEven($number) ? 'yes' : 'no';
    };

    run(GREETING, $getQuestion, $getAnswer);
}

function isEven($num)
{
    return $num % 2 === 0;
}
