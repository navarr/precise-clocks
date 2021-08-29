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
 * Clock that is guaranteed to return the same object so long as it is within the same hour.
 *
 * This clock always returns 0 for the minute, second, microsecond, and millisecond.
 */
class HourPrecisionClock extends AbstractPrecisionClock
{
    #[Pure]
    protected function getFormatForPrecisionTest(): string
    {
        return 'Y-m-d H';
    }

    #[Pure]
    protected function createDateTime(): DateTimeImmutable
    {
        $result = DateTimeImmutable::createFromFormat(
            'H:i:s u.v',
            $this->systemClock->now()->format('H') . ':00:00 0.0'
        );
        return $result ?: throw ClockCreationException::create(static::class);
    }
}
