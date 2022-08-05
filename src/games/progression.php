<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\playGame;

function playProgression(): void
{
    $questionSet = getQuestionSet();
    $questionStringSet = [];
    $correctAnswerSet = [];
    foreach ($questionSet as $value) {
        $hidenNum = rand(0, 9);
        $correctAnswerSet[] = $value[$hidenNum];
        $value[$hidenNum] = '..';
        $questionStringSet[] = implode(' ', $value);
    }
    playGame($questionStringSet, $correctAnswerSet);
}

function getQuestionSet(): array
{
    $questionSet = [];
    for ($i = 0; $i < 3; $i++) {
        $questionSet[] = getProgression();
    }

    return $questionSet;
}

function getProgression(): array
{
    $progression = [];
    $progression[0] = rand(1, 20);
    $progressionStep = rand(2, 5);
    for ($i = 1; $i < 10; $i++) {
        $progression[] = $progression[$i - 1] + $progressionStep;
    }
    return $progression;
}
