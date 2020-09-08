<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runEngine;

function generateDataGame($roundsCount) #generate data game "brain-even"
{
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
    define('ROUNDS_COUNT', '3');
    define('GAME_NAME', 'Answer "yes" if the number is even, otherwise answer "no"');
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_NAME);
}
