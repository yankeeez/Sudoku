<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

interface SudokuValidatorInterface
{
    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isSudokuValid(ValidationRequestDTO $validationRequestDTO): bool;
}
