<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\runEngine;

const ROUNDS_COUNT = 3;
const GAME_RULE = 'Find the greatest common divisor of given numbers.';

function findGcd($a, $b) #finding greatest common divisor
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

function generateDataGame($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $numberA = rand(1, 50);
        $numberB = rand(1, 50);
        $question = "{$numberA} {$numberB}";
        $correctAnswer = findGcd($numberA, $numberB);
        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame()
{
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_RULE);
}
