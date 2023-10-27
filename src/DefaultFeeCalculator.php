<?php

declare(strict_types=1);

namespace PhpConf;

class DefaultFeeCalculator implements FeeCalculator
{

    public function calculateFeet(float $amount): float
    {
        return $amount * 0.1;
    }
}