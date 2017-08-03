<?php

namespace BrainGames\Calc;

use function BrainGames\Cli\run;

const GREETING = "What is the result of the expression?";

function game()
{
    $operators = ['+', '-', '*'];
    $getRandomOperator = function () use ($operators) {
        return $operators[rand(0, count($operators) - 1)];
    };

    $getQuestion = function () use ($getRandomOperator) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $operator = $getRandomOperator();
        return "{$num1} {$operator} {$num2}";
    };

    $getAnswer = function ($str) {
        $arr = explode(" ", $str);
        $operator = $arr[1];
        $num1 = $arr[0];
        $num2 = $arr[2];

        switch ($operator) {
            case '+':
                return $num1 + $num2;
                break;
            case '-':
                return $num1 - $num2;
                break;
            case '*':
                return $num1 * $num2;
                break;
            default:
                break;
        }
    };

    run(GREETING, $getQuestion, $getAnswer);
}
