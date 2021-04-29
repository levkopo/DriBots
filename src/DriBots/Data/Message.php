<?php
declare(strict_types=1);

namespace DriBots\Data;

class Message {
    public function __construct(
        public int $id = 0,
        public int $fromId = 0,
        public int $ownerId = 0,
        public string $text = "",
        public ?Attachment $attachment = null
    ) {}
}