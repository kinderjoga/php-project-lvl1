<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\playGame;

require_once 'src/Engine.php';

function playCalc()
{
    $questions = getQuestion();
    $correctAnswers = getCorrectAnswer($questions);
    playGame($questions, $correctAnswers);
}

function getCorrectAnswer(array $questions): array
{
    $calculeted =  [];

    foreach ($questions as $question) {
        $calculeted[] = calculate($question);
    }

    return $calculeted;
}

function getQuestion(): array
{
    $questions = [];
    for ($i = 0; $i < 3; $i++) {
        $number1 = rand(0, 10);
        $number2 = rand(0, 10);
        $calulationSign = getCalculationSign();
        $questions[] = "{$number1} {$calulationSign} {$number2}";
    }

    return $questions;
}

function getCalculationSign(): string
{
    switch (rand(0, 2)) {
        case 0:
            $calulationSign = '+';
            break;

        case 1:
            $calulationSign = '-';
            break;

        case 2:
            $calulationSign = '*';
            break;
    }
    return $calulationSign;
}

function calculate(string $question): int
{
    $calculeted =  null;
    eval('$calculeted = ' . $question . ';');
    return (int)$calculeted;
}
