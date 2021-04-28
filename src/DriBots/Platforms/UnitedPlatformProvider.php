<?php


namespace DriBots\Platforms;


use DriBots\Data\Message;

final class UnitedPlatformProvider {
    public function __construct(
        private array $platforms
    ) {}

    public function sendMessage(string $toId, string $text): Message|false{
        if(preg_match('/(\w+)_(\d+)/', $toId, $out)&&
            isset($this->platforms[$out[1]])){
            $platform = $this->platforms[$out[1]];
            /** @var BasePlatform $platform*/
            if($platform->getPlatformProvider()!==null) {
                return $platform->getPlatformProvider()
                    ->sendMessage((int)$out[2], $text);
            }
        }

        return false;
    }
}