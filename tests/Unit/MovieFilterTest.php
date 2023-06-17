<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Filter\MovieFilter;
use App\Provider\MovieProvider;
use PHPUnit\Framework\TestCase;

class MovieFilterTest extends TestCase
{
    private readonly MovieFilter $moviesFilter;

    protected function setUp(): void
    {
        $moviesProvider = new MovieProvider();
        $this->moviesFilter = new MovieFilter($moviesProvider->getMovies());
    }

    public function testIfThreeRandomMoviesAreUnique(): void
    {
        $randomMovies = $this->moviesFilter->getRandomMovies(3);
        $uniqueRandomMovies = array_unique($randomMovies);

        $this->assertTrue(count($randomMovies) === count($uniqueRandomMovies));
    }
}