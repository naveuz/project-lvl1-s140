<?php

namespace BrainGames\Progression;

use function BrainGames\Cli\run;

const GREETING = "What number is missing in this progression?";

function game()
{
    $getQuestion = function () {
        $first = rand(1, 10);
        $diff = rand(1, 10);
        $index = rand(0, 9);
        $array = [];
        $array[0] = $first;
        for ($i = 1; $i < 10; $i++) {
            $array[$i] = $array[$i - 1] + $diff;
        }
        $array[$index] = '..';
        return join(" ", $array);
    };

    $getAnswer = function ($str) {
        $array = explode(" ", $str);
        $index = array_search("..", $array);
        if ($index === 0) {
            $diff = $array[2] - $array[1];
            return $array[1] - $diff;
        }
        if ($index === 1) {
            $diff = $array[3] - $array[2];
            return $array[2] - $diff;
        }
        $first = $array[0];
        $diff = $array[1] - $array[0];
        return $first + ($diff * $index);
    };

    run(GREETING, $getQuestion, $getAnswer);
}
