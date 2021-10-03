<?php declare(strict_types=1);

namespace DriBots\Platforms;


use DriBots\Data\Event;

abstract class BasePlatform {
    public abstract function getEvent(): Event|false;
    public abstract function requestIsAccept(): bool;
    public abstract function getPlatformProvider(): BasePlatformProvider;
    public abstract function getName(): string;

    public function handleEnd(): void {}
}