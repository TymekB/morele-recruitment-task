<?php

declare(strict_types=1);

namespace App\Filter;

class MovieFilter
{
    public function __construct(private readonly array $movies)
    {
    }

    public function getRandom(): array
    {
        $index = array_rand($this->movies);

        return $this->movies[$index];
    }
}