<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runEngine;

const ROUNDS_COUNT = 3;
const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateDataGame($roundsCount)
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

function runGame()
{
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_RULE);
}
