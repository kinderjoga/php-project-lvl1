<?php

namespace BrainGames\Even;


use function cli\line;
use function cli\prompt;

function isEven()
{
    $count = 0;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');


    do {
        $rnd = rand(0, 100);
        line("Question: {$rnd}");
        $currentAnswer = prompt('You answer');

        $even = !($rnd % 2);
        if (($currentAnswer === 'yes' && $even) || ($currentAnswer === 'no' && !$even)) {
            line("Correct!");
            $count += 1;
        } else {
            $correctAnswer = getCorrectAnsver($rnd);
            line("'{$currentAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return null;
        }
    } while ($count < 3);

    line("Congratulations, {$name}!");
}


function getCorrectAnsver($rnd)
{
    if ($rnd % 2 !== 0) {
        return 'no';
    } else {
        return 'yes';
    }
}
