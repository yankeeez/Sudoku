<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

class VerticalDataValidator implements DataValidatorInterface
{
    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isDataValid(ValidationRequestDTO $validationRequestDTO): bool
    {
        for ($i = 0; $i < $validationRequestDTO->getSquareSize(); $i++) {
            if (
                !$this->isDataInVerticalLineValid(
                    $validationRequestDTO->getData(),
                    $validationRequestDTO->getItemsSumInGroup(),
                    $validationRequestDTO->getSquareSize(),
                    $i
                )
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $matrix
     * @param int $sumOfItems
     * @param int $maxSize
     * @param int $columnIndex
     *
     * @return bool
     */
    protected function isDataInVerticalLineValid(array $matrix, int $sumOfItems, int $maxSize, int $columnIndex): bool
    {
        foreach ($matrix as $line) {
            if (!is_int($line[$columnIndex]) || $line[$columnIndex] > $maxSize) {
                return false;
            }

            $sumOfItems -= $line[$columnIndex];
        }

        return $sumOfItems === 0;
    }
}
