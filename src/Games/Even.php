<?php

namespace BrainGames\Even;

use function BrainGames\Engine\playGame;

require_once 'src/Engine.php';

function playIsEven()
{
    $questions = getQuestion();
    $correctAnswers = getCorrectAnswer($questions);
    playGame($questions, $correctAnswers);
}

function getQuestion(): array
{
    $question = [];
    for ($i = 0; $i < 3; $i++) {
        $question[$i] = rand(0, 100);
    }
    return $question;
}

function getCorrectAnswer(array $question): array
{
    $correctAnswer = [];
    for ($i = 0; $i < count($question); $i++) {
        if (isEven($question[$i])) {
            $correctAnswer[] = 'yes';
        } else {
            $correctAnswer[] = 'no';
        }
    }

    return $correctAnswer;
}

function isEven($question): bool
{
    $isEven = false;

    if (($question % 2) === 0) {
        $isEven = true;
    }
    return $isEven;
}
