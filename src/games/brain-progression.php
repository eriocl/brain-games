<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runEngine;

function getProgression($length, $firstElement, $step)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $firstElement + $step * $i;
    }
    return $progression;
}

function generateDataGame($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $progressionLength = rand(8, 10);
        $progressionFirstElement = rand(1, 10);
        $progressionStep = rand(1, 9);
        $progression = getProgression($progressionLength, $progressionFirstElement, $progressionStep);
        $randomIndex = array_rand($progression, 1);
        $correctAnswer = $progression[$randomIndex];
        $progression[$randomIndex] = '..';
        $question = implode(" ", $progression);
        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame()
{
    define('ROUNDS_COUNT', '3');
    define('GAME_NAME', 'What number is missing in the progression?');
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_NAME);
}
