<?php

namespace Brain\Games\Even;

use function cli\line;
use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function generateDataGame($roundsCount) #generate data game "brain-even"
{
    define('GAME_NAME','Answer "yes" if the number is even, otherwise answer "no"');
    $dataGame[0] = GAME_NAME;
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(1, 15);
        if ($question % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame() #game "brain-even
{
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
