<?php

namespace BrainGames\Cli;

use function \cli\line;

function run($greeting, $getQuestion, $getAnswer)
{
    line("Welcome to the Brain Game!");
    line($greeting);

    $name = \cli\prompt("May I have your name?");
    line("Hello, %s!", $name);

    for ($i = 0; $i < 3; $i++) {
        $question = $getQuestion();
        $rightAnswer = $getAnswer($question);
        line("Question: %s", $question);
        $userAnswer = \cli\prompt("Your answer");
        if ($userAnswer == $rightAnswer) {
            line("Correct!");
        } else {
            return line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.
                  Let's try again, {$name}");
        }
    }
    return line("Congratulations, {$name}!");
}
