<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function findGcd($a, $b)
{
    while ($a != $b) {
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
    $dataGame[0] = 'Find the greatest common divisor of given numbers';
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
    line('Welcome to the Brain Game!');
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
