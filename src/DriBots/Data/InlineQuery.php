<?php


namespace DriBots\Data;


class InlineQuery {
    public function __construct(
        public string $id,
        public User $user,
        public string $query,
    ) {}
}