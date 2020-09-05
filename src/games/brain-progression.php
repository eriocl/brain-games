<?php

namespace Brain\Games\Progression;

use function cli\line;
use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function getProgression()
{
    $i = rand(8, 10);
    $progression = [];
    $firstElementProgression = rand(1, 10);
    $progression[0] = $firstElementProgression;
    $progressionStep = rand(1, 9);
    for ($i = 0; $i < 10; $i++) {
        $progression[$i] = $firstElementProgression + $progressionStep * $i;
    }
    return $progression;
}
function generateDataGame($roundsCount)
{
    $dataGame[0] = 'What number is missing in the progression?';
    for ($i = 0; $i < $roundsCount; $i++) {
        $progression = getProgression();
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
    line('Welcome to the Brain Game!');
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
