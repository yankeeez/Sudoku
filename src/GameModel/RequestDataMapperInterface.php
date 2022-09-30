<?php

namespace App\GameModel;

interface RequestDataMapperInterface
{
    /**
     * @param string $requestData
     *
     * @return array
     */
    public function createMatrixFromRequestData(string $requestData): array;
}
