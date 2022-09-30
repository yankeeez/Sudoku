<?php

namespace App\GameModel;

interface SudokuCalculatorInterface
{
    /**
     * @param int $sizeOfSquare
     *
     * @return int
     */
    public function calculateTotalSumOfItems(int $sizeOfSquare): int;
}
