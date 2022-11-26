<?php

/**
 * Copyright © 2022 Navarr Barnier. All Rights Reserved.
 * Source available under the MIT License
 */

const VERSIONS = [8.0, 8.1, 8.2];
const DEFINITIVE_VERSION = 8.1;
const EXPERIMENTAL_VERSIONS = [8.2];

$matrix = [];

foreach (VERSIONS as $phpVersion) {
    $experimental = in_array($phpVersion, EXPERIMENTAL_VERSIONS);
    $definitive = $phpVersion === DEFINITIVE_VERSION;

    $matrix[] = [
        'php' => $phpVersion,
        'definitive' => $definitive,
        'experimental' => $experimental,
    ];
}

echo 'matrix=' . json_encode(['include' => $matrix]);
