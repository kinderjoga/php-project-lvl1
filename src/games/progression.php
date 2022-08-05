<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\playGame;

function playProgression(): void
{
    $questionSet = getQuestionSet();
    $questionStringSet = [];
    foreach ($questionSet as $value) {
        $questionStringSet[] = implode(' ', $value);
    }
    $correctAnswerSet = getCorrectAnswerSet($questionSet);
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

function getCorrectAnswerSet(array $questionSet): array
{
    $CorrectAnswerSet = [];
    foreach ($questionSet as $value) {
        $arr = $value;
<<<<<<< HEAD
        $hidenIndex = array_search('..', $arr, true);
=======
        $hidenIndex = array_search('..', $arr, false);
>>>>>>> b9d0983276ffc48e36c60a4e058c97d05e51aed7
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
    $progression = [];
    $progression[0] = rand(1, 20);
    $progressionStep = rand(2, 5);
    $hide = rand(0, 9);
    for ($i = 1; $i < 10; $i++) {
        $progression[] = $progression[$i - 1] + $progressionStep;
    }
    $progression[$hide] = '..';
    return $progression;
}
