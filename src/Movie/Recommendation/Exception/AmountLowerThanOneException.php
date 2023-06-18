<?php

declare(strict_types=1);

namespace App\Movie\Recommendation\Exception;

use Throwable;

class AmountLowerThanOneException extends MovieRecommendationException
{
    public function __construct(
        string $message = "Amount of movies cannot be lower than one",
        int $code = 0,
        ?Throwable $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }

}