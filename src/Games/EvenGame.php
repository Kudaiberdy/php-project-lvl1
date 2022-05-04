<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\gameCli;

const DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function checkIsEven(int $num): string
{
    return isEven($num) ? 'yes' : 'no';
}

function getDataGame()
{
    return function () {
        $question = rand(0, 100);
        $answer = checkIsEven($question);
        return [$answer, $question];
    };
}

function runGame(): void
{
    gameCli(getDataGame(), DESCRIPTION);
}
