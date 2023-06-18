<?php

declare(strict_types=1);

namespace Unit\MovieFilter;

use App\Filter\MovieFilter;
use App\Provider\MovieProvider;
use PHPUnit\Framework\TestCase;

class MoviesWithEvenTitleThatStartsWithLetterTest extends TestCase
{
    public function testIfMoviesHaveEvenTitleThatStartsWithLetter(): void
    {
        $moviesProvider = new MovieProvider();
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