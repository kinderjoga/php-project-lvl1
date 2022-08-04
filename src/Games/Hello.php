<?php

namespace BrainGames\Hello;

use function BrainGames\Engine\getHello;

require_once 'src/Engine.php';

function playHello()
{
    return getHello();
}