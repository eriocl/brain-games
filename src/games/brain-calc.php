<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runEngine;

const GAME_RULE = 'What is the result of the expression ?';

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

function generateGameData($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $numberA = rand(1, 50);
        $numberB = rand(1, 50);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations, 1)];
        $question = "{$numberA} {$operation} {$numberB}";
        $correctAnswer = calculate($numberA, $numberB, $operation);

        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);
    runEngine($gameData, GAME_RULE);
}
