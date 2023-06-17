<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Filter\Exception\AmountGreaterThanMoviesArrayLengthException;
use App\Filter\Exception\AmountLowerThanOneException;
use App\Filter\MovieFilter;
use App\Provider\MovieProvider;
use PHPUnit\Framework\TestCase;

class MovieFilterTest extends TestCase
{
    private readonly MovieFilter $movieFilter;

    protected function setUp(): void
    {
        $moviesProvider = new MovieProvider();
        $this->movieFilter = new MovieFilter($moviesProvider->getMovies());
    }

    public function testIfThreeRandomMoviesAreUnique(): void
    {
        $randomMovies = $this->movieFilter->getRandomMovies(3);
        $uniqueRandomMovies = array_unique($randomMovies);

        $this->assertTrue(count($randomMovies) === count($uniqueRandomMovies));
    }

    public function testIfAmountGreaterThanMoviesArrayLengthExceptionIsThrown(): void
    {
        $this->expectException(AmountGreaterThanMoviesArrayLengthException::class);

        $this->movieFilter->getRandomMovies(500);
    }

    public function testIfAmountLowerThanOneExceptionIsThrownWhenAmountIsEqualZero(): void
    {
        $this->expectException(AmountLowerThanOneException::class);

        $this->movieFilter->getRandomMovies(0);
    }
}