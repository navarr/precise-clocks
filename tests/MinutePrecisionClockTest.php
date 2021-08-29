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
use Navarr\PreciseClock\MinutePrecisionClock;
use Navarr\SpecificTime\SpecificTime;
use PHPUnit\Framework\TestCase;

class MinutePrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameMinuteReturnsTheSameObject(): void
    {
        $staticClock = new SpecificTime(new DateTimeImmutable());
        $precisionClock = new MinutePrecisionClock($staticClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }

    public function testCallInTheNextMinuteDoesNotReturnTheSameObject(): void
    {
        $advancingClock = new AdvancingClock(new DateInterval('PT1M'));
        $precisionClock = new MinutePrecisionClock($advancingClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertNotEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
