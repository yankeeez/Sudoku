<?php

namespace App\GameModel\Validator;

use App\Dto\ValidationRequestDTO;

class SudokuValidator implements SudokuValidatorInterface
{
    /**
     * @var array|DataValidatorInterface[]
     */
    public array $validatorsPluginStack;

    /**
     * @param DataValidatorInterface[]|array $validatorsStack
     */
    public function __construct(array $validatorsStack)
    {
        $this->validatorsPluginStack = $validatorsStack;
    }

    /**
     * @param ValidationRequestDTO $validationRequestDTO
     *
     * @return bool
     */
    public function isSudokuValid(ValidationRequestDTO $validationRequestDTO): bool
    {
        foreach ($this->validatorsPluginStack as $validator) {
            if (!$validator->isDataValid($validationRequestDTO)) {
                return false;
            }
        }

        return true;
    }
}
