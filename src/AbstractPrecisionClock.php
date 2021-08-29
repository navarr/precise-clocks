<?php

/**
 * Copyright © 2021-2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;

abstract class AbstractPrecisionClock implements \Psr\Clock\ClockInterface
{
    private DateTimeImmutable $lastReturnedTime;

    abstract protected function getFormatForPrecisionTest(): string;

    abstract protected function createDateTime(): DateTimeImmutable;

    public function now(): DateTimeImmutable
    {
        $now = $this->createDateTime();
        if (!isset($this->lastReturnedTime)) {
            $this->lastReturnedTime = $now;
            return $now;
        }

        $lastFormatted = $this->lastReturnedTime->format($this->getFormatForPrecisionTest());
        $nowFormatted = $now->format($this->getFormatForPrecisionTest());

        if ($lastFormatted !== $nowFormatted) {
            $this->lastReturnedTime = $now;
        }

        return $this->lastReturnedTime;
    }
}
