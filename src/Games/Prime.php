<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\playGame;

require_once 'src/Engine.php';

function playPrime()
{
    $questionSet = getQuestionSet();
    $correctAnswerSet = getCorrectAnswerSet($questionSet);
    playGame($questionSet, $correctAnswerSet);
}

function getQuestionSet(): array
{
    $questionSet = [];

    for ($i = 0; $i < 3; $i++) {
        $questionSet[] = rand(2, 30);
    }

    return $questionSet;
}

function getCorrectAnswerSet(array $questionSet): array
{
    $correctAnswerSet =  [];

    foreach ($questionSet as $question) {
        if (isPrime($question)) {
            $correctAnswerSet[] = 'yes';
        } else {
            $correctAnswerSet[] = 'no';
        }
    }

    return $correctAnswerSet;
}

function isPrime(int $num): bool
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
