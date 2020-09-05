<?php

namespace Brain\Games\Even;

use function cli\line;
use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function generateDataGame($roundsCount)
{
    $dataGame[0] = 'Answer "yes" if the number is even, otherwise answer "no"';
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(1,15);
        if ($question % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
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