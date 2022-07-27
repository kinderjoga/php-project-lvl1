<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\getHello;

require_once 'src/Engine.php';

function playCli()
{
    return getHello();
}
