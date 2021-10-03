<?php declare(strict_types=1);


namespace DriBots\Exceptions;


use Exception;
use JetBrains\PhpStorm\Pure;
use Throwable;

class InvalidBotClassException extends Exception {
    #[Pure] public function __construct() {
        parent::__construct("Invalid class passed. The class must inherit from the Bot class");
    }
}