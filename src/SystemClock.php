<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;
use JetBrains\PhpStorm\Pure;
use Psr\Clock\ClockInterface;

class SystemClock implements ClockInterface
{
    #[Pure]
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now');
    }
}
