<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock\Test;

use Navarr\PreciseClock\MinutePrecisionClock;
use PHPUnit\Framework\TestCase;

class MinutePrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameMinuteReturnsTheSameObject(): void
    {
        $precisionClock = new MinutePrecisionClock();

        while ((int)date('s') > 58) {
            /* loop until we have enough time */
        }

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }

    public function testCallInTheNextMinuteDoesNotReturnTheSameObject(): void
    {
        $precisionClock = new MinutePrecisionClock();

        $objectA = $precisionClock->now();
        $minute = (int)date('i');

        while ((int)date('i') === $minute) {
            /* loop until next second */
        }
        $objectB = $precisionClock->now();

        $this->assertNotEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
