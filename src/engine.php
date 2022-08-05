<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function playGame(array $question, array $correctAnswer): bool
{
    $count = 0;
    $name = getHello();

    do {
        line("Question: {$question[$count]}");
        $currentAnswer = getCurrentAnswer();
        if ($currentAnswer == $correctAnswer[$count]) {
            line("Correct!");
            $count += 1;
        } else {
            getLouse($name, $currentAnswer, $correctAnswer[$count]);
            return false;
        }
    } while ($count < 3);

    getWin($name);
    return true;
}

function getHello(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getCurrentAnswer(): string
{
    return prompt('You answer');
}

function getWin(string $name): void
{
    line("Congratulations, {$name}!");
}

function getLouse(string $name, string $currentAnswer, string $correctAnswer): void
{
    line("'{$currentAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    line("Let's try again, {$name}!");
}
