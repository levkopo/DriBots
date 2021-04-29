<?php declare(strict_types=1);


namespace DriBots\Platforms;


use DriBots\Data\Attachment;
use DriBots\Data\Message;
use DriBots\Data\User;

interface BasePlatformProvider {
    public function sendMessage(int $toId, string $text, Attachment $attachment): Message|false;
    public function getUser(int $userId): User|false;
}