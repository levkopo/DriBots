<?php declare(strict_types=1);


namespace DriBots\Platforms;


use DriBots\Data\Message;

interface BasePlatformProvider {
    public function sendMessage(int $toId, string $text): Message|false;
}