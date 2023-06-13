<?php

declare(strict_types=1);

namespace App\Filter;

class MovieFilter
{
    public function __construct(private readonly array $movies)
    {
    }
}