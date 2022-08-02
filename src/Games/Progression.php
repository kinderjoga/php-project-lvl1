<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\playGame;

require_once 'src/Engine.php';

function playProgression(): void
{
    $questionSet = getQuestionSet();
    $correctAnswerSet = getCorrectAnswerSet($questionSet);
    playGame($questionSet, $correctAnswerSet);
}

function getQuestionSet(): array
{
    $questionSet = [];
    for ($i = 0; $i < 3; $i++) {
        $questionSet[] = implode(' ', getProgression());
    }

    return $questionSet;
}

function getCorrectAnswerSet(array $questionSet): array
{
    $CorrectAnswerSet = [];
    foreach ($questionSet as $value) {
        $arr = explode(' ', $value);
        $hidenIndex = array_search('...', $arr);
        if ($hidenIndex < 2) {
            $hiden = $arr[$hidenIndex + 1] -  ($arr[$hidenIndex + 2] - $arr[$hidenIndex + 1]);
        } else {
            $hiden = $arr[$hidenIndex - 1] + ($arr[$hidenIndex - 1] - $arr[$hidenIndex - 2]);
        }
        $CorrectAnswerSet[] =  $hiden;
    }
    return $CorrectAnswerSet;
}

function getProgression(): array
{
    $progression[0] = rand(1, 20);
    $progressionStep = rand(2, 5);
    $hide = rand(0, 9);
    for ($i = 1; $i < 10; $i++) {
        $progression[] = $progression[$i - 1] + $progressionStep;
    }
    $progression[$hide] = '...';
    return $progression;
}
