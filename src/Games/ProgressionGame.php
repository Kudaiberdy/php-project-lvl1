<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\gameCli;

const DESCRIPTION = "What number is missing in the progression?";

function getArrProgression(int $startProgression, int $incremet): array
{
    $arrProgression[] = $startProgression;
    $value = $arrProgression[0];
    $incremetProgression = $incremet;
    for ($i = 0; $i <= rand(5, 10); $i++) {
        $value += $incremetProgression;
        $arrProgression[] = $value;
    }
     return $arrProgression;
}

function getElementFromProgression(array $progression)
{
     return $progression[rand(0, count($progression) - 1)];
}

function replaceElementInArr(array $arr, $element): array
{
    $replacedArr = $arr;
    foreach ($replacedArr as $key => $value) {
        if ($value === $element) {
            $replacedArr[$key] = '..';
        }
    }
    return $replacedArr;
}

function getDataGame()
{
    return function (): array {
        $arrProgression = getArrProgression(rand(0, 20), rand(1, 10));
        $answer = getElementFromProgression($arrProgression);
        $question = replaceElementInArr($arrProgression, $answer);
        return [$answer, implode(' ', $question)];
    };
}

function runGame(): void
{
    gameCli(getDataGame(), DESCRIPTION);
}
