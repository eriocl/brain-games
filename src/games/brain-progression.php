<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runEngine;

use const Brain\Games\Engine\ROUNDS_COUNT;

const GAME_RULE = 'What number is missing in the progression?';

function makeProgression($length, $firstElement, $step)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $firstElement + $step * $i;
    }
    return $progression;
}

function generateGameData($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $progressionLength = rand(8, 10);
        $progressionFirstElement = rand(1, 10);
        $progressionStep = rand(1, 9);
        $progression = makeProgression($progressionLength, $progressionFirstElement, $progressionStep);
        $randomIndex = array_rand($progression, 1);
        $correctAnswer = (string)$progression[$randomIndex];
        $progression[$randomIndex] = '..';
        $question = implode(" ", $progression);
        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);
    runEngine($gameData, GAME_RULE);
}
