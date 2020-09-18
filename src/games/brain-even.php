<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runEngine;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function generateGameData($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(1, 15);
        if ($question % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);
    runEngine($gameData, GAME_RULE);
}
