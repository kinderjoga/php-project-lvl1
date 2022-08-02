<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\playGame;

require_once 'src/Engine.php';

function playGcd()
{
    $questions = getQuestion();
    $correctAnswers = getCorrectAnswer($questions);
    playGame($questions, $correctAnswers);
}

function getQuestion(): array
{
    $questions = [];
    for ($i = 0; $i < 3; $i++) {
        $number1 = rand(0, 50);
        $number2 = rand(0, 50);
        $questions[] = "{$number1} {$number2}";
    }

    return $questions;
}

function getCorrectAnswer($questionSet): array
{
    $nodSet =  [];
    foreach ($questionSet as $value) {
        $nodSet[] = array_sum(evklid($value));
    }

    return $nodSet;
}

function evklid(string $value): array
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
