<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\runEngine;

const ROUNDS_COUNT = 3;
const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
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

function generateDataGame($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $randomNumber = rand(1, 100);
        $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
        $question = $randomNumber;
        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame()
{
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_RULE);
}
