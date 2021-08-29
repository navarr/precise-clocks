<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;
use JetBrains\PhpStorm\Pure;

class DayPrecisionClock extends AbstractPrecisionClock
{
    #[Pure]
    protected function getFormatForPrecisionTest(): string
    {
        return 'Y-m-d';
    }

    #[Pure]
    protected function createDateTime(): DateTimeImmutable
    {
        $result = DateTimeImmutable::createFromFormat(
            'Y-m-d H:i:s u.v',
            $this->systemClock->now()->format('Y-m-d') . ' 0:00:00 0.0'
        );
        return $result ?? throw ClockCreationException::create(static::class);
    }
}
