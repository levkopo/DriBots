<?php


namespace DriBots\Data;


class InlineQueryResult {
    public function __construct(
        public string $title,
        public string $messageText,
        public string $description = "",
    ) {}
}