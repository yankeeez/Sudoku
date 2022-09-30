<?php

namespace App\GameModel;

use App\Dto\ResultResponseDTO;
use App\Dto\ValidationRequestDTO;
use App\GameModel\Validator\SudokuValidatorInterface;
use SudokuConstants;

class SudokuHandler implements SudokuHandlerInterface
{
    /**
     * @var RequestDataMapperInterface
     */
    public $requestDataMapper;

    /**
     * @var SudokuValidatorInterface
     */
    public $sudokuValidator;

    /**
     * @var SudokuCalculatorInterface
     */
    public $sudokuCalculator;

    /**
     * @param RequestDataMapperInterface $requestDataMapper
     * @param SudokuValidatorInterface $sudokuValidator
     * @param SudokuCalculatorInterface $sudokuCalculator
     */
    public function __construct(
        RequestDataMapperInterface $requestDataMapper,
        SudokuValidatorInterface $sudokuValidator,
        SudokuCalculatorInterface $sudokuCalculator
    ) {
        $this->requestDataMapper = $requestDataMapper;
        $this->sudokuValidator = $sudokuValidator;
        $this->sudokuCalculator = $sudokuCalculator;
    }

    /**
     * @param array $requestData
     *
     * @return ResultResponseDTO
     */
    public function handleRequest(array $requestData): ResultResponseDTO
    {
        if (empty($requestData[SudokuConstants::SUDOKU_DATA_KEY])) {
            return (new ResultResponseDTO())
                ->setIsSuccessful(false);
        }

        $matrix = $this->requestDataMapper->createMatrixFromRequestData(trim($requestData[SudokuConstants::SUDOKU_DATA_KEY]));
        $squareSize = count($matrix[0]);

        $validationRequestDTO = (new ValidationRequestDTO())
            ->setData($matrix)
            ->setSquareSize($squareSize)
            ->setItemsSumInGroup($this->sudokuCalculator->calculateTotalSumOfItems($squareSize))
        ;

        $result = $this->sudokuValidator->isSudokuValid($validationRequestDTO);

        return (new ResultResponseDTO())
            ->setIsSuccessful($result);
    }
}
