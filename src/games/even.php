<?php

namespace BrainGames\Even;

use function BrainGames\Engine\playGame;

function playEven()
{
    $questionSet = getQuestionSet();
    $correctAnswerSet = getCorrectAnswerSet($questionSet);
    playGame($questionSet, $correctAnswerSet);
}

function getQuestionSet(): array
{
    $questionSet = [];

    for ($i = 0; $i < 3; $i++) {
        $questionSet[] = rand(0, 100);
    }
    return $questionSet;
}

function getCorrectAnswerSet(array $questionSet): array
{
    $correctAnswerSet =  [];

    foreach ($questionSet as $question) {
        $correctAnswerSet[] = isEven($question) ? 'yes' : 'no';
    }
    return $correctAnswerSet;
}

function isEven($number): bool
{
    return $number % 2 === 0;
}
