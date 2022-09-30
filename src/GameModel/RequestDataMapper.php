<?php

namespace App\GameModel;

class RequestDataMapper implements RequestDataMapperInterface
{
    /**
     * @param string $requestData
     *
     * @return array
     */
    public function createMatrixFromRequestData(string $requestData): array
    {
        $matrix = [];
        $lines = explode(PHP_EOL, $requestData);

        foreach ($lines as $key => $line) {
            $splittedItems = explode(',', trim($line));

            foreach ($splittedItems as $item) {
                $matrix[$key][] = (int)$item;

            }
        }

        return $matrix;
    }
}
