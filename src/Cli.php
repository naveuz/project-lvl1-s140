<?php

namespace BrainGames\Cli;

use function \cli\line;

function run($greeting, $getQuestion, $getAnswer)
{
    line($greeting);
    line();
    $name = \cli\prompt("May I have your name?");
    line("Hello, %s!", $name);
    line();
    
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

function startGame()
{
      line("********************************");
      line("***Welcome to the Brain Game!***");
      line("********************************");
      line();
      line("List of games:");
      line("1. brain-even");
      line("2. brain-calc");
      line("3. brain-gcd");
      line("4. brain-balance");
      line("5. brain-progression");
      line("6. brain-prime");
      line();
      $number = \cli\prompt("Select game");
      line();

    switch ($number) {
        case '1':
            return \BrainGames\Even\game();
        case '2':
            return \BrainGames\Calc\game();
        case '3':
            return \BrainGames\Gcd\game();
        case '4':
            return \BrainGames\Balance\game();
        case '5':
            return \BrainGames\Progression\game();
        case '6':
            return \BrainGames\Prime\game();
        default:
            return "Game not found";
    }
}
