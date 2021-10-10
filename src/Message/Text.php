<?php

namespace l1n6yun\DingTalk\Message;

/**
 * @method static $this make(string $content)
 */
class Text extends Message
{

    protected function type(): string
    {
        return 'text';
    }

    protected function transform($value): array
    {
        list($content) = $value;

        return ['content' => $content];
    }
}