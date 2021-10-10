<?php

namespace l1n6yun\DingTalk\Message;

/**
 * @method static $this make(string $title, string $text)
 */
class Markdown extends Message
{
    protected function type(): string
    {
        return 'markdown';
    }

    protected function transform($value): array
    {
        list($title, $text) = $value;

        return ['title' => $title, 'text' => $text];
    }
}