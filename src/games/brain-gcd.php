<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\runEngine;

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

function generateDataGame($roundsCount) #generate data game "brain-gcd"
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

function runGame() #game "brain-gcd"
{
    define('ROUNDS_COUNT', '3');
    define('GAME_NAME', 'Find the greatest common divisor of given numbers');
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_NAME);
}
