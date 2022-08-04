<?php

namespace BrainGames\Hello;

use function BrainGames\Engine\getHello;

function playHello()
{
    require_once 'src/Engine.php';
    return getHello();
}
