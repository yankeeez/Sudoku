<?php

namespace App\Dto;

class ValidationRequestDTO
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * @var int
     */
    protected int $squareSize;

    /**
     * @var int
     */
    protected int $itemsSumInGroup;

    /**
     * @return int
     */
    public function getItemsSumInGroup(): int
    {
        return $this->itemsSumInGroup;
    }

    /**
     * @param int $itemsSumInGroup
     */
    public function setItemsSumInGroup(int $itemsSumInGroup): self
    {
        $this->itemsSumInGroup = $itemsSumInGroup;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return int
     */
    public function getSquareSize(): int
    {
        return $this->squareSize;
    }

    /**
     * @param int $squareSize
     *
     * @return $this
     */
    public function setSquareSize(int $squareSize): self
    {
        $this->squareSize = $squareSize;

        return $this;
    }
}
