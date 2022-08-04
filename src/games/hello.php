<?php

namespace BrainGames\Hello;

use function BrainGames\Engine\getHello;

function playHello()
{
    require_once 'src/engine.php';
    return getHello();
}
