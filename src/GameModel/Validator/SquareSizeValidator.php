<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

class SquareSizeValidator implements DataValidatorInterface
{
    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isDataValid(ValidationRequestDTO $validationRequestDTO): bool
    {
        $firstLineSize = count($validationRequestDTO->getData()[0]);

        if (sqrt($firstLineSize) === floor(sqrt($firstLineSize))) {
            return true;
        }

        return false;
    }
}
