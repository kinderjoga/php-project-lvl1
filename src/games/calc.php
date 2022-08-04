<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\playGame;

function playCalc()
{
    require_once 'src/engine.php';
    $questionSet = getQuestionSet();
    $correctAnswerSet = getCorrectAnswerSet($questionSet);
    playGame($questionSet, $correctAnswerSet);
}

function getCorrectAnswerSet(array $questionSet): array
{
    $calculeted =  [];

    foreach ($questionSet as $question) {
        $calculeted[] = calculate($question);
    }

    return $calculeted;
}

function getQuestionSet(): array
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
