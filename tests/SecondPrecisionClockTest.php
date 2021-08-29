<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

declare(strict_types=1);

namespace Navarr\PreciseClock\Test;

use Navarr\PreciseClock\SecondPrecisionClock;
use PHPUnit\Framework\TestCase;

class SecondPrecisionClockTest extends TestCase
{
    public function testCallsWithinTheSameSecondReturnsTheSameObject(): void
    {
        $precisionClock = new SecondPrecisionClock();

        while ((int)date('v') > 100) {
            /* loop until we have enough time */
        }

        $objectA = $precisionClock->now();
        $objectB = $precisionClock->now();

        $this->assertEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }

    public function testCallInTheNextSecondDoesNotReturnTheSameObject(): void
    {
        $precisionClock = new SecondPrecisionClock();

        $objectA = $precisionClock->now();
        $second = (int)date('s');

        while ((int)date('s') === $second) {
            /* loop until next second */
        }
        $objectB = $precisionClock->now();

        $this->assertNotEquals(
            spl_object_id($objectA),
            spl_object_id($objectB)
        );
    }
}
