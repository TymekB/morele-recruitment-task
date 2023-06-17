<?php

declare(strict_types=1);

namespace App\Filter\Exception;
use Throwable;

class AmountGreaterThanMoviesArrayLengthException extends \Exception
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