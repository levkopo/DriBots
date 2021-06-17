<?php

namespace DriBots;

use DriBots\Data\Event;
use DriBots\Data\Message;
use DriBots\Platforms\BasePlatform;
use DriBots\Platforms\BasePlatformProvider;
use Monolog\Test\TestCase;

class TestBot extends TestCase {
    public BasePlatform $platform;

    public function __construct(?string $name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);
        $this->platform = new class extends BasePlatform {

            public function requestIsAccept(): bool {
                return true;
            }

            public function getEvent(): Event|false {
                return Event::NEW_MESSAGE(new Message(1, 2, text: "Test!"));
            }

            public function getPlatformProvider(): ?BasePlatformProvider {
                return parent::getPlatformProvider();
            }

            public function getName(): string {
                return "test_plat";
            }
        };
    }

    /**
     * @test
     */
    public function getNameTest(): void {
        self::assertEquals("test_plat", $this->platform->getName());
    }

    /**
     * @test
     * @throws Exceptions\InvalidBotClassException
     * @throws \ReflectionException
     */
    public function callBot(): void {
        DriBotsHandler::new(new class extends Bot {
            public function onNewMessage(Message $message): void {
                TestCase::assertEquals("Test!", $message->text);
                TestCase::assertEquals(1, $message->id);
                TestCase::assertEquals(2, $message->ownerId);
            }
        })->addPlatform($this->platform)->handle();
    }
}