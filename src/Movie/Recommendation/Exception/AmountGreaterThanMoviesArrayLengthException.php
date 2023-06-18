<?php

declare(strict_types=1);

namespace App\Movie\Recommendation\Exception;
use Throwable;

class AmountGreaterThanMoviesArrayLengthException extends MovieRecommendationException
{
    public function __construct(
        string $message = "Amount of random movies cannot be greater than movies array length",
        int $code = 0,
        ?Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }

}