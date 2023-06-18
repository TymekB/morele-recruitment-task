<?php

declare(strict_types=1);

namespace App\Tests\Unit\MovieFilter;
use App\Filter\MovieFilter;
use App\Tests\DataProvider\MovieDataProvider;
use PHPUnit\Framework\TestCase;

class MoviesWithTitleGreaterThanNumberOfWordsTest extends TestCase
{
    public function testIfMoviesHaveTitleGreaterThanSpecifiedNumberOfWords()
    {
        $moviesProvider = new MovieDataProvider();
        $movieFilter = new MovieFilter($moviesProvider->getMovies());

        $movies = $movieFilter->getMoviesWithTitleGreaterThanNumberOfWords(1);
        $expectedMovies = ["Pulp Fiction", "Skazani na Shawshank", "Dwunastu gniewnych ludzi", "Ojciec chrzestny", "Leon zawodowiec", "Władca Pierścieni: Powrót króla", "Fight Club", "Forrest Gump", "Chłopaki nie płaczą", "Człowiek z blizną", "Doktor Strange", "Szeregowiec Ryan", "Lot nad kukułczym gniazdem", "Wielki Gatsby", "Avengers: Wojna bez granic", "Życie jest piękne", "Pożegnanie z Afryką", "Milczenie owiec", "Dzień świra", "Blade Runner", "Król Lew", "La La Land", "Wyspa tajemnic", "American Beauty", "Szósty zmysł", "Gwiezdne wojny: Nowa nadzieja", "Mroczny Rycerz", "Władca Pierścieni: Drużyna Pierścienia", "Harry Potter i Kamień Filozoficzny", "Green Mile", "Mad Max: Na drodze gniewu", "Terminator 2: Dzień sądu", "Piraci z Karaibów: Klątwa Czarnej Perły", "Truman Show", "Skazany na bluesa", "Gran Torino", "Mroczna wieża", "Casino Royale", "Piękny umysł", "Władca Pierścieni: Dwie wieże", "Zielona mila", "Requiem dla snu", "Forest Gump", "Requiem dla snu", "Milczenie owiec", "Breaking Bad", "Nagi instynkt", "Igrzyska śmierci", "Siedem dusz", "Dzień świra", "Pan życia i śmierci", "Hobbit: Niezwykła podróż", "Pachnidło: Historia mordercy", "Wielki Gatsby", "Sin City", "Przeminęło z wiatrem", "Królowa śniegu"];

        $this->assertEqualsCanonicalizing($movies, $expectedMovies);
    }
}