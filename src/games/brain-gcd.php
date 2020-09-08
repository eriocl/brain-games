<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function findGcd($a, $b) #finding greatest common divisor
{
    while (($a != 0) && ($b != 0)) {
        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }
    return $a;
}

function generateDataGame($roundsCount) #generate data game "brain-gcd"
{
    define('GAME_NAME', 'Find the greatest common divisor of given numbers');
    $dataGame[0] = GAME_NAME;
    for ($i = 0; $i < $roundsCount; $i++) {
        $numberA = rand(1, 50);
        $numberB = rand(1, 50);
        $question = "{$numberA} {$numberB}";
        $correctAnswer = findGcd($numberA, $numberB);
        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame() #game "brain-gcd"
{
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
