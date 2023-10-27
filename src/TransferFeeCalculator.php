<?php

namespace PhpConf;

interface TransferFeeCalculator
{
    public function calculateFeet(float $amount): float;
}