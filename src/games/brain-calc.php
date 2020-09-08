<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runEngine;

function calculate($a, $b, $operation)
{
    switch ($operation) {
        case '-':
            return $a - $b;
        case '+':
            return $a + $b;
        case '*':
            return $a * $b;
    }
}

function generateDataGame($roundsCount) #generate data game "brain-calc"
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $numberA = rand(1, 50);
        $numberB = rand(1, 50);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations, 1)];
        $question = "{$numberA} {$operation} {$numberB}";
        $correctAnswer = calculate($numberA, $numberB, $operation);

        $dataGame[] = [$question, $correctAnswer];
    }
    return $dataGame;
}

function runGame() # game "brain-calc"
{
    define('ROUNDS_COUNT', '3');
    define('GAME_NAME', 'What is the result of the expression ?');
    $dataGame = generateDataGame(ROUNDS_COUNT);
    runEngine($dataGame, GAME_NAME);
}
