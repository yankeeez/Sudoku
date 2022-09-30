<?php

namespace App;

use App\GameModel\RequestDataMapper;
use App\GameModel\RequestDataMapperInterface;
use App\GameModel\SudokuCalculator;
use App\GameModel\SudokuCalculatorInterface;
use App\GameModel\SudokuHandler;
use App\GameModel\SudokuHandlerInterface;
use App\GameModel\Validator\DataValidatorInterface;
use App\GameModel\Validator\HorizontalDataValidator;
use App\GameModel\Validator\SquareSizeValidator;
use App\GameModel\Validator\SubsquareDataValidatior;
use App\GameModel\Validator\SudokuValidator;
use App\GameModel\Validator\SudokuValidatorInterface;
use App\GameModel\Validator\VerticalDataValidator;

class SudokuBusinessFactory
{
    /**
     * @return SudokuHandlerInterface
     */
    public function createSudokuHandler(): SudokuHandlerInterface
    {
        return new SudokuHandler(
            $this->createRequestDataMapper(),
            $this->createSudokuValidator(),
            $this->createSudokuCalculator()
        );
    }

    /**
     * @return RequestDataMapperInterface
     */
    public function createRequestDataMapper(): RequestDataMapperInterface
    {
        return new RequestDataMapper();
    }

    /**
     * @return SudokuCalculatorInterface
     */
    public function createSudokuCalculator(): SudokuCalculatorInterface
    {
        return new SudokuCalculator();
    }

    /**
     * @return SudokuValidatorInterface
     */
    public function createSudokuValidator(): SudokuValidatorInterface
    {
        return new SudokuValidator(
            [
                $this->createSquareSizeValidator(),
                $this->createHorizontalDataValidator(),
                $this->createVerticalDataValidator(),
                $this->createSubsquareDataValidator(),
            ],
        );
    }

    /**
     * @return DataValidatorInterface
     */
    public function createSquareSizeValidator(): DataValidatorInterface
    {
        return new SquareSizeValidator();
    }

    /**
     * @return DataValidatorInterface
     */
    public function createHorizontalDataValidator(): DataValidatorInterface
    {
        return new HorizontalDataValidator();
    }

    /**
     * @return DataValidatorInterface
     */
    public function createVerticalDataValidator(): DataValidatorInterface
    {
        return new VerticalDataValidator();
    }

    /**
     * @return DataValidatorInterface
     */
    public function createSubsquareDataValidator(): DataValidatorInterface
    {
        return new SubsquareDataValidatior();
    }
}
