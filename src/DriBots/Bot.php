<?php declare(strict_types=1);

namespace DriBots;

use DriBots\Data\InlineQuery;
use DriBots\Data\Message;
use DriBots\Platforms\BasePlatform;
use DriBots\Platforms\BasePlatformProvider;

abstract class Bot {
    public BasePlatformProvider $platformProvider;
    public BasePlatform $platform;

    /**
     * @var BasePlatform[]
     */
    private array $platforms = [];

    final public function __construct(){}

    //Events
    public function onNewMessage(Message $message): void {}
    public function onInlineQuery(InlineQuery $inlineQuery): void {}

    public function acceptPlatforms(array $platforms): void {
        if(empty($this->platforms)) $this->platforms = $platforms;
    }

    public function getPlatformProvider(string $name): BasePlatformProvider|false {
        if(!isset($this->platforms[$name])) return $this->platforms[$name]->getPlatformProvider()
        return false;
    }
}