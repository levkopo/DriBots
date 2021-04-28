<?php
declare(strict_types=1);

namespace DriBots;

use DriBots\Data\Message;
use DriBots\Platforms\BasePlatformProvider;
use DriBots\Platforms\UnitedPlatformProvider;

abstract class Bot {
    public BasePlatformProvider $platformProvider;
    public UnitedPlatformProvider $unitedPlatformProvider;

    final public function __construct(){}
    public function onNewMessage(Message $message){}


}