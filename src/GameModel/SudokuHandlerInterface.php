<?php

namespace App\GameModel;

use App\Dto\ResultResponseDTO;

interface SudokuHandlerInterface
{
    /**
     * @param array $requestData
     *
     * @return ResultResponseDTO
     */
    public function handleRequest(array $requestData): ResultResponseDTO;
}
