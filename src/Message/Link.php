<?php

namespace l1n6yun\DingTalk\Message;

/**
 * @method static $this make(string $title, string $text, string $messageUrl)
 */
class Link extends Message
{

    protected function type(): string
    {
        return 'link';
    }

    protected function transform($value): array
    {
        list($title, $text, $messageUrl) = $value;

        return [
            'title' => $title,
            'text' => $text,
            'messageUrl' => $messageUrl
        ];
    }

    public function setPictureUrl(string $value): Link
    {
        return $this->setAttributes('picUrl', $value);
    }
}