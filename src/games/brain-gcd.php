<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function generateDataGame($roundsCount)
{
    $dataGame[0] = 'Find the greatest common divisor of given numbers';
    for ($i = 0; $i < $roundsCount; $i++) {
        $a = rand(1, 50);
        $b = rand(1, 50);
        $question = "{$a} {$b}";
        $correctAnswer = gmp_gcd($a, $b);
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
