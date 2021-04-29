<?php
declare(strict_types=1);

namespace DriBots;

use DriBots\Data\Message;
use DriBots\Platforms\BasePlatformProvider;

abstract class Bot {
    public BasePlatformProvider $platformProvider;

    private ?array $platforms = null;

    final public function __construct(){}

    //Events
    public function onNewMessage(Message $message): void {}

    public function acceptPlatforms(array $platforms): void {
        if($this->platforms===null) {
            $this->platforms = $platforms;
        }
    }

    public function getPlatform(string $name): BasePlatformProvider|false {
        if($this->platforms===null) {
            return false;
        }

        return $this->platforms[$name]??false;
    }
}