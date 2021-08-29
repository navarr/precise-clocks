<?php

/**
 * Copyright © 2021-2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock;

use DateTimeImmutable;
use JetBrains\PhpStorm\Pure;
use Navarr\WallClock\WallClock;
use Psr\Clock\ClockInterface;

abstract class AbstractPrecisionClock implements ClockInterface
{
    private DateTimeImmutable $lastReturnedTime;

    protected ClockInterface $systemClock;

    #[Pure]
    public function __construct(ClockInterface $systemClock = null)
    {
        $this->systemClock = $systemClock ?? new WallClock();
    }

    abstract protected function getFormatForPrecisionTest(): string;

    abstract protected function createDateTime(): DateTimeImmutable;

    #[Pure]
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
