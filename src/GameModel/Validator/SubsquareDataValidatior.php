<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

class SubsquareDataValidatior implements DataValidatorInterface
{
    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isDataValid(ValidationRequestDTO $validationRequestDTO): bool
    {
        $subsquareSize = sqrt($validationRequestDTO->getSquareSize());

        for ($i = 0; $i < $validationRequestDTO->getSquareSize(); $i += $subsquareSize) {
            for ($j = 0; $j < $validationRequestDTO->getSquareSize(); $j += $subsquareSize ) {
                if (!$this->isDataInSubsquareValid($validationRequestDTO, $i, $j)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param ValidationRequestDTO $validationRequestDTO
     * @param int $startIndexAxisX
     * @param int $startIndexAxisY
     *
     * @return bool
     */
    protected function isDataInSubsquareValid(
        ValidationRequestDTO $validationRequestDTO,
        int $startIndexAxisX,
        int $startIndexAxisY
    ): bool {
        $subsquareSize = sqrt($validationRequestDTO->getSquareSize());
        $matrix = $validationRequestDTO->getData();
        $sumOfItems = $validationRequestDTO->getItemsSumInGroup();

        for ($i = $startIndexAxisX; $i < $startIndexAxisX + $subsquareSize; $i++) {
            for ($j = $startIndexAxisY; $j < $startIndexAxisY + $subsquareSize; $j++) {
                if (!is_int($matrix[$i][$j]) || $matrix[$i][$j] > $validationRequestDTO->getSquareSize()) {
                    return false;
                }

                $sumOfItems -= $matrix[$i][$j];
            }
        }

        return $sumOfItems === 0;
    }
}
