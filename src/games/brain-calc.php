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
        default:
            print_r("{$operation} invalid operand for Brain\Games\Calc\calculate.");
    }
}

function generateGameData($roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $numberA = rand(1, 50);
        $numberB = rand(1, 50);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];
        $question = "{$numberA} {$operation} {$numberB}";
        $correctAnswer = (string)calculate($numberA, $numberB, $operation);

        $gameData[] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);
    runEngine($gameData, GAME_RULE);
}
