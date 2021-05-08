<?php declare(strict_types=1);

namespace DriBots\SimpleBot;


use DriBots\Bot;
use DriBots\Data\Message;
use DriBots\DriBotsHandler;
use PHPUnit\Framework\TestCase;

class TestSimpleBot extends TestCase {

    public static string $value;

    /**
     * @throws \ReflectionException
     * @throws \DriBots\Exceptions\InvalidBotClassException
     */
    public function mainTest(){
        $_GET['conditionForRun'] = 123;

        DriBotsHandler::new(new class extends Bot {
            public function onNewMessage(Message $message) {
                TestSimpleBot::$value = "ok";
            }

        })->addPlatform(new TestPlatform())->handle();
        self::assertEquals("ok", self::$value);
    }
}