<?php

namespace Brain\Games\Prime;

use function cli\line;
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
function generateDataGame($roundsCount) #generation data game "brain-prime"
{
    $dataGame[0] = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    line('Welcome to the Brain Game!');
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
