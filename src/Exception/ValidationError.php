<?php declare(strict_types=1);

namespace Kata\Exception;

class ValidationError extends \Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message);
    }
}
