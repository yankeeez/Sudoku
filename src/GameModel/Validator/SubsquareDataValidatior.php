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

        for ($startIndexAxisX = 0; $startIndexAxisX < $validationRequestDTO->getSquareSize(); $startIndexAxisX += $subsquareSize) {
            for ($startIndexAxisY = 0; $startIndexAxisY < $validationRequestDTO->getSquareSize(); $startIndexAxisY += $subsquareSize ) {
                if (!$this->isDataInSubsquareValid($validationRequestDTO, $startIndexAxisX, $startIndexAxisY)) {
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

        for ($axisXCoordinate = $startIndexAxisX; $axisXCoordinate < $startIndexAxisX + $subsquareSize; $axisXCoordinate++) {
            for ($axisYCoordinate = $startIndexAxisY; $axisYCoordinate < $startIndexAxisY + $subsquareSize; $axisYCoordinate++) {
                if (!is_int($matrix[$axisXCoordinate][$axisYCoordinate]) || $matrix[$axisXCoordinate][$axisYCoordinate] > $validationRequestDTO->getSquareSize()) {
                    return false;
                }

                $sumOfItems -= $matrix[$axisXCoordinate][$axisYCoordinate];
            }
        }

        return $sumOfItems === 0;
    }
}
