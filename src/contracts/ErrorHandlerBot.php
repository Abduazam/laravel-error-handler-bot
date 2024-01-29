<?php

namespace Abduazam\ErrorHandlerBot\contracts;

use Abduazam\ErrorHandlerBot\contracts\Traits\TelegramBotRequest;

/**
 * Telegram Bot Class.
 *
 * @author Abduazam Maxsudov <abduazamdev@gmail.com>
 */
class ErrorHandlerBot
{
    use TelegramBotRequest;

    private string $botApiToken;
    private ?string $channelId;
    private ?string $groupId;

    public function __construct()
    {
        $this->botApiToken = $this->setBotApiToken();
        $this->groupId = $this->setGroupId();
        $this->channelId = $this->setChannelId();
    }

    private function setBotApiToken()
    {
        return config('error-handler-bot.bot-api-token');
    }

    private function setGroupId()
    {
        return config('error-handler-bot.receiver.group');
    }

    private function setChannelId()
    {
        return config('error-handler-bot.receiver.channel');
    }

    private function getBotApiToken()
    {
        return $this->botApiToken;
    }

    private function getReceiverId()
    {
        return ! is_null($this->groupId) ? $this->groupId : $this->channelId;
    }
}
