<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function getProgression() # generating a random progression
{
    $lengthProg = rand(8, 10);
    $progression = [];
    $firstElementProgression = rand(1, 10);
    $progression[0] = $firstElementProgression;
    $progressionStep = rand(1, 9);
    for ($i = 0; $i < $lengthProg; $i++) {
        $progression[$i] = $firstElementProgression + $progressionStep * $i;
    }
    return $progression;
}

function generateDataGame($roundsCount) #generate data game "brain-progression"
{
    define('GAME_NAME','What number is missing in the progression?');
    $dataGame[0] = GAME_NAME;
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

function runGame() #game "brain-progression"
{
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
