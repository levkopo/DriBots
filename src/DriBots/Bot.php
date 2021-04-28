<?php
declare(strict_types=1);

namespace DriBots;

use DriBots\Data\Message;
use DriBots\Platforms\BasePlatform;

abstract class Bot {
    public BasePlatform $platform;

    public final function __construct(){}

    public function onNewMessage(Message $message){}
}