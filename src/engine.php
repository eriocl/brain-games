<?php

namespace Brain\Games\Engine;

const ROUNDS_COUNT = 3;

use function cli\line;
use function cli\prompt;

function runEngine($gameData, $gameRule)
{
    line('Welcome to the Brain Game!');
    line("{$gameRule}");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            return line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        }
    }
    return line("Congratulations, {$name}!");
}
