<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

interface DataValidatorInterface
{
    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isDataValid(ValidationRequestDTO $validationRequestDTO): bool;
}
