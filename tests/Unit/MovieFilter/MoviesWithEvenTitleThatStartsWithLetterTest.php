<?php

declare(strict_types=1);

namespace App\Tests\Unit\MovieFilter;

use App\Filter\MovieFilter;
use App\Tests\DataProvider\MovieDataProvider;
use PHPUnit\Framework\TestCase;

class MoviesWithEvenTitleThatStartsWithLetterTest extends TestCase
{
    public function testIfMoviesHaveEvenTitleThatStartsWithLetter(): void
    {
        $moviesProvider = new MovieDataProvider();
        $movieFilter = new MovieFilter($moviesProvider->getMovies());

        $movies = $movieFilter->getMoviesWithEvenTitleThatStartsWithLetter('W');
        $expectedMovies = [
            'Whiplash',
            'Wyspa tajemnic',
            'Władca Pierścieni: Drużyna Pierścienia',
            'Władca Pierścieni: Dwie wieże'
        ];

        $this->assertEqualsCanonicalizing($movies, $expectedMovies);
    }
}