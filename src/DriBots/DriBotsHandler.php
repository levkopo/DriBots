<?php
declare(strict_types=1);


namespace DriBots;


use DriBots\Exceptions\InvalidBotClassException;
use DriBots\Platforms\BasePlatform;
use DriBots\Platforms\UnitedPlatformProvider;
use JetBrains\PhpStorm\Pure;
use ReflectionClass;

class DriBotsHandler {
    private array $platforms = [];
    private Bot $bot;

    /**
     * @throws \ReflectionException
     * @throws InvalidBotClassException
     */
    private function __construct(string|Bot $bot) {
        if(is_string($bot)) {
            if(class_exists($bot)) {
                $class = new ReflectionClass($bot);
                if($class->isSubclassOf(Bot::class)) {
                    $this->bot = new $bot;
                }else throw new InvalidBotClassException();
            }else throw new InvalidBotClassException();
        }else $this->bot = $bot;
    }

    public function addPlatform(BasePlatform $platform): DriBotsHandler{
        $this->platforms[] = $platform;
        return $this;
    }

    public function handle(): void {
        foreach($this->platforms as $platform){
            /*** @var BasePlatform $platform */
            if($platform->requestIsAccept()&&
                ($platformProvider = $platform->getPlatformProvider())&&
                $platformProvider!==null){
                $this->bot->acceptPlatforms($this->platforms);
                $this->bot->platformProvider = $platformProvider;

                if($event = $platform->getEvent()) {
                    $event->call($this->bot);
                }

                $platform->handleEnd();
                break;
            }
        }
    }

    /**
     * @throws \ReflectionException
     * @throws InvalidBotClassException
     */
    public static function new(string|Bot $className): DriBotsHandler {
        return new DriBotsHandler($className);
    }
}