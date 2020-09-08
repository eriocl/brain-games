<?php

namespace Brain\Games\Prime;

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
    define('ROUNDS_COUNT', '3');
    define('GAME_NAME', 'Answer "yes" if given number is prime. Otherwise answer "no".');
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_NAME);
}
