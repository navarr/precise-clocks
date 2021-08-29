# Specified Precision Clocks (PSR-20)
[![Latest Stable Version](http://poser.pugx.org/navarr/precise-clocks/v)](https://packagist.org/packages/navarr/precise-clocks)
[![Total Downloads](http://poser.pugx.org/navarr/precise-clocks/downloads)](https://packagist.org/packages/navarr/precise-clocks)
[![Latest Unstable Version](http://poser.pugx.org/navarr/precise-clocks/v/unstable)](https://packagist.org/packages/navarr/precise-clocks)
[![License](http://poser.pugx.org/navarr/precise-clocks/license)](https://packagist.org/packages/navarr/precise-clocks)  
![Tests](https://github.com/navarr/precise-clocks/actions/workflows/commit.yml/badge.svg)
![Code Coverage](https://codecov.io/gh/navarr/precise-clocks/branch/main/graph/badge.svg?token=BHTKOZZDR3)

This library contains implementations of PSR-20 that provides a clocks that are precise to their namesake, and while in the same time to that precision, return the exact same object.

## Installation

    composer require navarr/precise-clocks:@dev

## Usage

```php
use Navarr\PreciseClock\MinutePrecisionClock;

$clock = new MinutePrecisionClock();
$a = $clock->now();
$b = $clock->now();

spl_object_id($a) === spl_object_id($b); // true

```
