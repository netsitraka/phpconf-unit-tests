<?php

declare(strict_types=1);

namespace PhpConf;

interface FeeCalculator
{
    public function calculateFeet(float $amount): float;
}