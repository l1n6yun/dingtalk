<?php

namespace l1n6yun\DingTalk\Message;

/**
 * @method static $this make(array $links = [])
 */
class FeedCard extends Message
{
    protected function type(): string
    {
        return 'feedCard';
    }

    protected function transform($value): array
    {
        list($links) = $value;

        return ['links' => $links];
    }

    public function addLinks(string $title, string $messageUrl, string $picUrl): FeedCard
    {
        $this->value[0][] = [
            'title' => $title,
            'messageURL' => $messageUrl,
            'picURL' => $picUrl
        ];
        return $this;
    }
}