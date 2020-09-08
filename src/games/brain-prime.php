<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function isPrime($number) #detecting prime number
{
    if ($number === 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function generateDataGame($roundsCount) #generate data game "brain-prime"
{
    define('GAME_NAME','Answer "yes" if given number is prime. Otherwise answer "no".');
    $dataGame[0] = GAME_NAME;
    for ($i = 0; $i < $roundsCount; $i++) {
        $randomNumber = rand(1, 100);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $question = $randomNumber;
        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame() #game "brain-prime"
{
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
