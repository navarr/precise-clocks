<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock\Test;

use DateInterval;
use DateTimeImmutable;
use Navarr\PeriodicAdvancement\AdvancingClock;
use Navarr\PreciseClock\DayPrecisionClock;
use Navarr\SpecificTime\SpecificTime;
use PHPUnit\Framework\TestCase;

class DayPrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameHourReturnsTheSameObject(): void
    {
        $staticClock = new SpecificTime(new DateTimeImmutable());
        $precisionClock = new DayPrecisionClock($staticClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }

    public function testCallInTheNextHourDoesNotReturnTheSameObject(): void
    {
        $advancingClock = new AdvancingClock(new DateInterval('P1D'));
        $precisionClock = new DayPrecisionClock($advancingClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertNotEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
