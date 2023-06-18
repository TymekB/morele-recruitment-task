<?php

declare(strict_types=1);

namespace App\Tests\Unit\MovieRecommendation;

use App\Movie\Recommendation\MovieRecommendation;
use App\Tests\DataProvider\MovieDataProvider;
use PHPUnit\Framework\TestCase;

class MoviesWithEvenTitleThatStartsWithLetterTest extends TestCase
{
    public function testIfMoviesHaveEvenTitleThatStartsWithLetter(): void
    {
        $moviesProvider = new MovieDataProvider();
        $movieRecommendation = new MovieRecommendation($moviesProvider->getMovies());

        $movies = $movieRecommendation->getMoviesWithEvenTitleThatStartsWithLetter('W');
        $expectedMovies = [
            'Whiplash',
            'Wyspa tajemnic',
            'Władca Pierścieni: Drużyna Pierścienia',
            'Władca Pierścieni: Dwie wieże'
        ];

        $this->assertEqualsCanonicalizing($movies, $expectedMovies);
    }
}