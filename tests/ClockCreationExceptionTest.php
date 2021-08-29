<?php

/**
 * Copyright © 2021 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

namespace Navarr\PreciseClock\Test;

use Navarr\PreciseClock\ClockCreationException;
use PHPUnit\Framework\TestCase;

class ClockCreationExceptionTest extends TestCase
{
    public function testExceptionMessageIsAsExpected()
    {
        $uniqid = uniqid();
        $exception = ClockCreationException::create($uniqid);

        $this->assertStringContainsString(
            'Could not create ' . $uniqid . ' at ',
            $exception->getMessage()
        );
    }
}
