<?php

declare(strict_types=1);

namespace App\Tests\Unit\MovieRecommendation;

use App\Movie\Recommendation\Exception\AmountGreaterThanMoviesArrayLengthException;
use App\Movie\Recommendation\Exception\AmountLowerThanOneException;
use App\Movie\Recommendation\MovieRecommendation;
use App\Tests\DataProvider\MovieDataProvider;
use PHPUnit\Framework\TestCase;

class RandomMoviesTest extends TestCase
{
    private readonly MovieRecommendation $movieRecommendation;

    protected function setUp(): void
    {
        $moviesProvider = new MovieDataProvider();
        $this->movieRecommendation = new MovieRecommendation($moviesProvider->getMovies());
    }

    public function testIfThreeRandomMoviesAreUnique(): void
    {
        $randomMovies = $this->movieRecommendation->getRandomMovies(3);
        $uniqueRandomMovies = array_unique($randomMovies);

        $this->assertTrue(count($randomMovies) === count($uniqueRandomMovies));
    }

    public function testIfAmountGreaterThanMoviesArrayLengthExceptionIsThrown(): void
    {
        $this->expectException(AmountGreaterThanMoviesArrayLengthException::class);

        $this->movieRecommendation->getRandomMovies(500);
    }

    public function testIfAmountLowerThanOneExceptionIsThrownWhenAmountIsEqualZero(): void
    {
        $this->expectException(AmountLowerThanOneException::class);

        $this->movieRecommendation->getRandomMovies(0);
    }

    public function testIfAmountLowerThanOneExceptionIsThrownWhenAmountIsLowerThanZero(): void
    {
        $this->expectException(AmountLowerThanOneException::class);

        $this->movieRecommendation->getRandomMovies(-1);
    }
}