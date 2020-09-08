<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function getProgression($length, $firstElement, $step) # generate a progression
{
    $progression = [];
    $progression[0] = $firstElement;
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $firstElement + $step * $i;
    }
    return $progression;
}

function generateDataGame($roundsCount) #generate data game "brain-progression"
{
    define('GAME_NAME', 'What number is missing in the progression?');
    $dataGame[0] = GAME_NAME;
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

function runGame() #game "brain-progression"
{
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
