<?php

namespace Abduazam\ErrorHandlerBot\contracts\Traits;

use Throwable;

trait TelegramBotRequest
{
    private function sendRequest($url, array $content): bool|string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

    public function endpoint(string $api, array $content)
    {
        $url = 'https://api.telegram.org/bot' . $this->getBotApiToken() . '/' . $api;

        $reply = $this->sendRequest($url, $content);

        return json_decode($reply, true);
    }

    public function sendMessage(Throwable $exception)
    {
        $content = $this->makeContent($exception);

        return $this->endpoint('sendMessage', $content);
    }

    private function makeContent(Throwable $exception): array
    {
        $projectName = config('app.name');
        $projectUrl = config('app.url');
        $errorMessage = $exception->getMessage();
        $errorFile = $exception->getFile();
        $errorLine = $exception->getLine();

        if (filter_var($projectUrl, FILTER_VALIDATE_URL)) {
            $projectLink = "<b>Project:</b> <a href='$projectUrl'><u>$projectName</u></a>\n\n";
        } else {
            $projectLink = "<b>Project:</b> <u>$projectName</u>\n\n";
        }

        $errorText = "⚠️️\n\n$projectLink";
        $errorText .= "<b>Line:</b> <u>$errorLine</u>\n";
        $errorText .= "<b>File:</b> <pre><code>$errorFile</code></pre>\n\n";
        $errorText .= "<b>Error:</b> <pre><code>$errorMessage</code></pre>";

        return [
            'chat_id' => $this->getReceiverId(),
            'text' => $errorText,
            'parse_mode' => 'html',
        ];
    }
}
