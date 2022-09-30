<?php

namespace App\GameModel;

class SudokuCalculator implements SudokuCalculatorInterface
{
    /**
     * @param int $sizeOfSquare
     *
     * @return int
     */
    public function calculateTotalSumOfItems(int $sizeOfSquare): int
    {
        return (1 + $sizeOfSquare) * ($sizeOfSquare / 2);
    }
}
