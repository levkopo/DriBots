# DriBots
Chat bot library for VK.com, Telegram and other platforms

## Installing
To install dribots you need composer and PHP 8.0 and higher (if you have, of course xD)
```
composer require levkopo/dribots
```

## Installing platform libraries
In addition, to use DriBots for other platforms, you need the required platform libraries.


For Telegram:
```
composer require levkopo/dribots-telegram
```

For VK.com:
```
composer require levkopo/dribots-vk
```

## Usage

Example bot resend sended message for VK.com and Telegram:
```php
use DriBots\Bot;
use DriBots\Data\Message;
use DriBots\DriBotsHandler;
use DriBots\Platforms\TelegramPlatform;
use DriBots\Platforms\VKPlatform;

const TELEGRAM_BOT_TOKEN = "<telegram token>";

const VK_ACCESS_TOKEN = "<vk token>";
const VK_GROUP_ID = <vk group id>;

include_once __DIR__."/./vendor/autoload.php";

DriBotsHandler::new(new class extends Bot {
    public function onNewMessage(Message $message): void {
        $this->platformProvider->sendMessage($message->fromId, $message->text,
            $message->attachment?->save($message->fromId.$message->id));
    }
})->addPlatform(new VKPlatform(VK_ACCESS_TOKEN, VK_GROUP_ID))
    ->addPlatform(new TelegramPlatform(TELEGRAM_BOT_TOKEN))
    ->handle();
```
