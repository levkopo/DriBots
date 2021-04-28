<?php
declare(strict_types=1);

namespace DriBots\Platforms;


use DriBots\Data\Event;

abstract class BasePlatform {

    public function requestIsAccept(): bool {
        return false;
    }

    public function getEvent(): Event|false {
        return false;
    }

    public function getPlatformProvider(): ?BasePlatformProvider {
        return null;
    }

    public function handleEnd(): void {}
    public function getName(): string {
        return "";
    }
}