<?php

declare(strict_types=1);

namespace App\Movie\Recommendation;

use App\Movie\Recommendation\Exception\AmountGreaterThanMoviesArrayLengthException;
use App\Movie\Recommendation\Exception\AmountLowerThanOneException;

class MovieRecommendation
{
    public function __construct(private readonly array $movies)
    {
    }

    public function getRandomMovies(int $amount): array
    {
        if($amount > count($this->movies)) {
            throw new AmountGreaterThanMoviesArrayLengthException();
        }

        if($amount < 1) {
            throw new AmountLowerThanOneException();
        }

        $indexes = array_rand($this->movies, $amount);
        $randomMovies = [];

        foreach ($indexes as $index) {
            $randomMovies[] = $this->movies[$index];
        }

        return $randomMovies;
    }

    public function getMoviesWithEvenTitleThatStartsWithLetter(string $letter): array
    {
        return array_filter($this->movies, function(string $movie) use ($letter) {
            return str_starts_with($movie, $letter) && strlen($movie) % 2 === 0;
        });
    }

    public function getMoviesWithTitleGreaterThanNumberOfWords(int $numberOfWords): array
    {
        return array_filter($this->movies, function(string $movie) use($numberOfWords): bool {
            return $this->getNumberOfWords($movie) > $numberOfWords;
        });
    }

    private function getNumberOfWords(string $str): int
    {
        return count(preg_split('~[^\p{L}\p{N}\']+~u', $str));
    }
}