<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function runEngine($dataGame, $gameName) # game body
{
    line('Welcome to the Brain Game!');
    line("{$gameName}");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $roundsCount = count($dataGame);
    foreach ($dataGame as [$question, $correctAnswer]) {
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            return line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        }
    }
    return line("Congratulations, {$name}!");
}
