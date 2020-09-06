<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\getRoundsCount;
use function Brain\Games\Engine\runEngine;

function calculate($a, $b, $operation) #calculate expression
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
function generateDataGame($roundsCount) #generation data game "brain-calc"
{
    $dataGame[0] = 'What is the result of the expression ?';
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
    $roundsCount = getRoundsCount();
    $dataGame = generateDataGame($roundsCount);
    runEngine($dataGame);
}
