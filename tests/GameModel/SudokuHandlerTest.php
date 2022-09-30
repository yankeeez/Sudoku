<?php

namespace App\Tests\GameModel;

use App\SudokuBusinessFactory;
use PHPUnit\Framework\TestCase;
use App\Shared\SudokuConstants;

class SudokuHandlerTest extends TestCase
{
    /**
     * @dataProvider sudokuHandlerDataProvider
     *
     * @param array $requestData
     * @param bool $expectedResult
     *
     * @return void
     */
    public function testSudokuHandler(array $requestData, bool $expectedResult): void
    {
        $sudokuFactory = new SudokuBusinessFactory();

        $resultDto = $sudokuFactory->createSudokuHandler()->handleRequest($requestData);

        $this->assertSame($resultDto->isSuccessful(), $expectedResult);
    }

    /**
     * @return array[]
     */
    public function sudokuHandlerDataProvider(): array
    {
        return [
            'empty request' => [
                [],
                false,
            ],
            'empty sudoku data' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '',
                ],
                false,
            ],
            'invalid data 1' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => ' , , ,',
                ],
                false,
            ],
            'invalid data 2' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3',
                ],
                false,
            ],
            'invalid square size' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3' . PHP_EOL . '2,3,1' . PHP_EOL . '3,1,2',
                ],
                false,
            ],
            'valid square size and valid sudoku' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3,4' . PHP_EOL . '3,4,2,1' . PHP_EOL . '4,3,1,2' . PHP_EOL . '2,1,4,3',
                ],
                true,
            ],
            'valid square size invalid items 1 - wrong items order in 2nd and 3rd lines' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3,4' . PHP_EOL . '4,3,2,1' . PHP_EOL . '4,3,1,2' . PHP_EOL . '2,1,4,3',
                ],
                false,
            ],
            'valid square size invalid items 2 - empty value in 2nd line' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3,4' . PHP_EOL . ',3,2,1' . PHP_EOL . '4,3,1,2' . PHP_EOL . '2,1,4,3',
                ],
                false,
            ],
            'valid square size invalid items 4 - last line has less elements' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3,4' . PHP_EOL . '4,3,2,1,' . PHP_EOL . '4,3,1,2' . PHP_EOL . '2,1,4',
                ],
                false,
            ],
            'valid square size and invalid sudoku 5 - wrong symbol' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => 'a,2,3,4' . PHP_EOL . '3,4,2,1' . PHP_EOL . '4,3,1,2' . PHP_EOL . '2,1,4,3',
                ],
                false,
            ],
            'valid square size and invalid sudoku - 2,3,4 lines have more items' => [
                [
                    SudokuConstants::SUDOKU_DATA_KEY => '1,2,3,4' . PHP_EOL . '3,4,2,1,1' . PHP_EOL . '4,3,1,2,2' . PHP_EOL . '2,1,4,3,2',
                ],
                false,
            ],
        ];
    }
}
