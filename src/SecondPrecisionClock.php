<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;
use JetBrains\PhpStorm\Pure;

/**
 * Clock that is guaranteed to return the same object so long as it is within the same second.
 *
 * This clock always returns 0 for the microsecond, and millisecond.
 */
class SecondPrecisionClock extends AbstractPrecisionClock
{
    #[Pure]
    protected function getFormatForPrecisionTest(): string
    {
        return 'Y-m-d H:i:s';
    }

    #[Pure]
    protected function createDateTime(): DateTimeImmutable
    {
        $result = DateTimeImmutable::createFromFormat('H:i:s u.v', $this->systemClock->now()->format('H:i:s') . ' 0.0');
        return $result ?: throw ClockCreationException::create(static::class);
    }
}
