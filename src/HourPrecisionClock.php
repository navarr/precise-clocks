<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;

/**
 * Clock that is guaranteed to return the same object so long as it is within the same hour.
 *
 * This clock always returns 0 for the minute, second, microsecond, and millisecond.
 */
class HourPrecisionClock extends AbstractPrecisionClock
{
    protected function getFormatForPrecisionTest(): string
    {
        return 'Y-m-d H';
    }

    protected function createDateTime(): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat('H:i:s u.v', date('H') . ':00:00 0.0');
    }
}
