<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\playGame;

function playGcd()
{
    $questionSet = getQuestionSet();
    $correctAnswerSet = getCorrectAnswerSet($questionSet);
    playGame($questionSet, $correctAnswerSet);
}

function getQuestionSet(): array
{
    $questionSet = [];
    for ($i = 0; $i < 3; $i++) {
        $number1 = rand(1, 50);
        $number2 = rand(1, 50);
        $questionSet[] = "{$number1} {$number2}";
    }

    return $questionSet;
}

function getCorrectAnswerSet(array $questionSet): array
{
    $nodSet =  [];
    foreach ($questionSet as $value) {
        $nodSet[] = array_sum(getNod($value));
    }

    return $nodSet;
}

function getNod(string $value): array
{
    $arr = explode(' ', $value);
    $m = $arr[0];
    $n = $arr[1];
    do {
        if ($m > $n) {
            $m = $m % $n;
        } else {
            $n = $n % $m;
        }
    } while ($m !== 0 && $n !== 0);
    $nod = [$m, $n];
    return $nod;
}
