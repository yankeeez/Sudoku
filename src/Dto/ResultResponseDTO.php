<?php

namespace App\Dto;

class ResultResponseDTO
{
    /**
     * @var bool
     */
    protected bool $isSuccessful;

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->isSuccessful;
    }

    /**
     * @param bool $isSuccessful
     *
     * @return $this
     */
    public function setIsSuccessful(bool $isSuccessful): self
    {
        $this->isSuccessful = $isSuccessful;

        return $this;
    }
}
