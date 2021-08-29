<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use JetBrains\PhpStorm\Pure;
use RuntimeException;

class ClockCreationException extends RuntimeException
{
    #[Pure]
    public static function create(string $clockClassName): ClockCreationException
    {
        return new static('Could not create ' . $clockClassName . ' at ' . date('Y-m-d H:i:s u.v'));
    }
}
