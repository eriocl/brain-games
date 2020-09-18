<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\runEngine;

const GAME_RULE = 'Find the greatest common divisor of given numbers.';

function findGcd($a, $b)
{
    while ($a != 0 && $b != 0) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $a;
}

function generateGameData($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $numberA = rand(1, 50);
        $numberB = rand(1, 50);
        $question = "{$numberA} {$numberB}";
        $correctAnswer = findGcd($numberA, $numberB);
        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);
    runEngine($gameData, GAME_RULE);
}
