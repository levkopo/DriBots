<?php


namespace DriBots\SimpleBot;


use DriBots\Data\Event;
use DriBots\Data\Message;
use DriBots\Platforms\BasePlatform;
use JetBrains\PhpStorm\Pure;

class TestPlatform extends BasePlatform {
    public function getName(): string {
        return "test";
    }

    public function requestIsAccept(): bool {
        return isset($_GET['conditionForRun']);
    }

    #[Pure] public function getEvent(): Event|bool {
        return Event::NEW_MESSAGE(new Message(
            123, 5, "Test message!"));
    }
}