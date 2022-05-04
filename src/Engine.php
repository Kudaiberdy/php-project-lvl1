<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function gameCli(callable $gameData, string $gameRules): bool
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($gameRules);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$answer, $question] = $gameData();
        line("Question: %s", $question);
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $answer) {
            line("Correct!");
            continue;
        }
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
        line("Let's try again, %s!", $userName);
        return false;
    }
    line("Congratulations, %s!", $userName);
    return true;
}
