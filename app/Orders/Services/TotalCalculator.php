<?php

namespace App\Orders\Services;

use App\Orders\Models\OrderLine;

class TotalCalculator
{
    /**
     * Calculate the total cost of order lines.
     *
     * @return int Total cost in pence.
     */
    public static function calculate(iterable $orderLines): int
    {
        $total = 0;

        /**
         * @var OrderLine $orderLine
         */
        foreach ($orderLines as $orderLine) {
            $total += $orderLine->net_pence;
        }

        return $total;
    }
}