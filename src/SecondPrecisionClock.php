<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;

/**
 * Clock that is guaranteed to return the same object so long as it is within the same second.
 *
 * This clock always returns 0 for the microsecond, and millisecond.
 */
class SecondPrecisionClock extends AbstractPrecisionClock
{
    protected function createDateTime(): DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat('H:i:s u.v', date('H:i:s') . ' 0.0');
    }

    protected function getFormatForPrecisionTest(): string
    {
        return 'Y-m-d H:i:s';
    }
}
