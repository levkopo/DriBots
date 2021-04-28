<?php declare(strict_types=1);

namespace DriBots\SimpleBot;


use DriBots\Bot;
use DriBots\Data\Message;
use DriBots\DriBotsHandler;
use PHPUnit\Framework\TestCase;

class TestSimpleBot extends TestCase {

    public static TestSimpleBot $instance;

    /**
     * @throws \ReflectionException
     * @throws \DriBots\Exceptions\InvalidBotClassException
     */
    public function mainTest(){
        self::$instance = $this;
        $_GET['conditionForRun'] = 123;

        DriBotsHandler::new(new class extends Bot {
            public function onNewMessage(Message $message) {
                echo "OK";
            }

        })->addPlatform(new TestPlatform())->handle();
    }
}