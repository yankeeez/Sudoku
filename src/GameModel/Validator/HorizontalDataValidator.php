<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

class HorizontalDataValidator implements DataValidatorInterface
{
    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isDataValid(ValidationRequestDTO $validationRequestDTO): bool
    {
        foreach ($validationRequestDTO->getData() as $lineData) {
            if (!$this->isDataInLineValid($lineData, $validationRequestDTO->getItemsSumInGroup(), $validationRequestDTO->getSquareSize())) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $lineData
     * @param int $sumOfItems
     * @param int $maxSize
     *
     * @return bool
     */
    protected function isDataInLineValid(array $lineData, int $sumOfItems, int $maxSize): bool
    {
        foreach ($lineData as $item) {
            if (!is_int($item) || $item > $maxSize) {
                return false;
            }

            $sumOfItems -= $item;
        }

        return $sumOfItems === 0;
    }
}
