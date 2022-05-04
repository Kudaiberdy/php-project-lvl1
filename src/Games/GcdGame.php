<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Engine\gameCli;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function getGcdOfNumbers(int $firstArg, int $secondArg): array
{
    return [gcd($firstArg, $secondArg), "{$firstArg} {$secondArg}"];
}

function gcd(int $firstArg, int $secondArg): int
{
    $devisorsOffirstArg = getDevisorsOfnum(abs($firstArg));
    $devisorsOfsecondArg = getDevisorsOfnum(abs($secondArg));
    $intersectionsDevisors = array_uintersect($devisorsOffirstArg, $devisorsOfsecondArg, fn($a, $b) => $a <=> $b);
    print_r(max($intersectionsDevisors));
    return max($intersectionsDevisors);
}

function getDevisorsOfnum(int $num): array
{
    $devisors = [];
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i === 0) {
            $devisors[] = $i;
        }
    }
    return $devisors;
}

function getDataGame()
{
    return function (): array {
        $firstArg = rand(0, 100);
        $secondArg = rand(0, 100);
        $question = "{$firstArg} {$secondArg}";
        $answer = gcd($firstArg, $secondArg);
        return [$answer, $question];
    };
}

function runGame(): void
{
    gameCli(getDataGame(), DESCRIPTION);
}
