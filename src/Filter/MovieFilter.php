<?php

declare(strict_types=1);

namespace App\Filter;

class MovieFilter
{
    public function __construct(private readonly array $movies)
    {
    }

    public function getRandomMovie(): array
    {
        $index = array_rand($this->movies);

        return $this->movies[$index];
    }

    public function getMoviesWithEvenTitleThatStartsWithLetter(string $letter): array
    {
        return array_filter($this->movies, function(string $title) use ($letter) {
            return str_starts_with($title, $letter) && strlen($title) % 2 === 0;
        });
    }
}