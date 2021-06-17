<?php
declare(strict_types=1);


namespace DriBots\Data;


use DriBots\Bot;
use JetBrains\PhpStorm\Pure;

class Event {
    private function __construct(
        private string $functionName,
        private array $args
    ) {}

    #[Pure] public static function NEW_MESSAGE(Message $message): Event {
        return new Event("onNewMessage", [$message]);
    }

    #[Pure] public static function INLINE_QUERY(InlineQuery $inlineQuery): Event {
        return new Event("onInlineQuery", [$inlineQuery]);
    }

    public function call(Bot $bot): void {
        call_user_func_array([$bot,
            $this->functionName], $this->args);
    }
}