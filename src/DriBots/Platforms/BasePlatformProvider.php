<?php declare(strict_types=1);


namespace DriBots\Platforms;


use DriBots\Data\Attachment;
use DriBots\Data\Message;
use DriBots\Data\User;

interface BasePlatformProvider {
    public function sendMessage(int $chatId, string $text, Attachment $attachment = null): Message|false;
    public function getUser(int $chatId, int $userId): User|false;
}