<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Engine\gameCli;

const DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

function isPrime(int $num): bool
{
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function checkPrime(int $randNum): string
{
    return isPrime($randNum) ? 'yes' : 'no';
}

function getDataGame()
{
    return function (): array {
        $question = rand(0, 100);
        $answer = checkPrime($question);
        return [$answer, $question];
    };
}

function runGame(): void
{
    gameCli(getDataGame(), DESCRIPTION);
}
