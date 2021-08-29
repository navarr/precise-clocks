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
use Navarr\PreciseClock\SecondPrecisionClock;
use Navarr\SpecificTime\SpecificTime;
use PHPUnit\Framework\TestCase;

class SecondPrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameSecondReturnsTheSameObject(): void
    {
        $specificTimeClock = new SpecificTime(new DateTimeImmutable());
        $precisionClock = new SecondPrecisionClock($specificTimeClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }

    public function testCallInTheNextSecondDoesNotReturnTheSameObject(): void
    {
        $periodicallyAdvancingClock = new AdvancingClock(new DateInterval('PT1S'));
        $precisionClock = new SecondPrecisionClock($periodicallyAdvancingClock);

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertNotEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
