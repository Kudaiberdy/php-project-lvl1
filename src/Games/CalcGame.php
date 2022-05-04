<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Engine\gameCli;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ['+', '-', '*'];

function getResultOperation(string $operator, int $firstArg, int $secondArg): int
{
    switch ($operator) {
        case '+':
            return $firstArg + $secondArg;
        case '-':
            return $firstArg - $secondArg;
        case '*':
            return $firstArg * $secondArg;
        default:
            return 0;
    }
}

function getDataGame()
{
    return function (): array {
        $randOperator1 = rand(0, 10);
        $randOperator2 = rand(0, 10);
        $operator = OPERATORS[rand(0, count(OPERATORS) - 1)];
        $answer = getResultOperation($operator, $randOperator1, $randOperator2);
        $question = "{$randOperator1} {$operator} {$randOperator2}";
        return [$answer, $question];
    };
}

function runGame(): void
{
    gameCli(getDataGame(), DESCRIPTION);
}
