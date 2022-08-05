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
        if ($question % 2 !== 0) {
            $correctAnswerSet[] = 'no';
        } else {
            $correctAnswerSet[] = 'yes';
        }
    }

    return $correctAnswerSet;
}
