<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getRoundsCount() #asking user about rounds count
{
    line('Welcome to the Brain Game!');
    $flag = false;
    while ($flag !== true) {
        $roundsCount = prompt('How many rounds do you want ? ');
        if ((intval($roundsCount) <= 0)) {
            line('Wrong count, pls dont be rude');
        } else {
            $flag = true;
        }
    }
    return $roundsCount;
}

function runEngine($dataGame) # game body
{
    line("{$dataGame[0]}");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $roundsCount = count($dataGame);
    for ($i = 1; $i < $roundsCount; $i++) {
        [$question, $correctAnswer] = $dataGame[$i];
        line("Question: {$question}");
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            return line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer} .");
        }
    }
    return line("Congratulations, {$name}!");
}
