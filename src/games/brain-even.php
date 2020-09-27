<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\ROUNDS_COUNT;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}
function generateGameData($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $question = rand(1, 15);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);
    runEngine($gameData, GAME_RULE);
}
