<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

namespace Navarr\PreciseClock\Test;

use Navarr\PreciseClock\HourPrecisionClock;
use PHPUnit\Framework\TestCase;

class HourPrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameHourReturnsTheSameObject(): void
    {
        $precisionClock = new HourPrecisionClock();

        while ((int)date('i') === 59 && (int)date('s') > 58) {
            /* if we're 2 seconds away from the next hour, wait - just in case */
        }

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
