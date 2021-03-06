<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

namespace Navarr\PreciseClock\Test;

use DateInterval;
use DateTimeImmutable;
use Navarr\PeriodicAdvancement\AdvancingClock;
use Navarr\PreciseClock\HourPrecisionClock;
use Navarr\SpecificTime\SpecificTime;
use PHPUnit\Framework\TestCase;

class HourPrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameHourReturnsTheSameObject(): void
    {
        $staticClock = new SpecificTime(new DateTimeImmutable());
        $precisionClock = new HourPrecisionClock($staticClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }

    public function testCallInTheNextHourDoesNotReturnTheSameObject(): void
    {
        $advancingClock = new AdvancingClock(new DateInterval('PT1H'));
        $precisionClock = new HourPrecisionClock($advancingClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertNotEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
