<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function getHello()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
