<?php
declare(strict_types=1);

namespace DriBots\Data;

class User {
    public function __construct(
        public int $id = 0,
        public string $username = "",
    ) {}
}