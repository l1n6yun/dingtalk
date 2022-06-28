<?php

namespace l1n6yun\DingTalk\Message\custom;

use l1n6yun\DingTalk\Message\Message;

class Template extends Message
{
    protected array $item = [];

    protected function type(): string
    {
        return 'actionCard';
    }

    protected function transform($value): array
    {
        list($title) = $value;

        $item = array_merge([
            '### '.$title,
            '###### '.date('m月d日'),
        ], $this->item);
        $text = implode("\n\n", $item);
        return [
            "title" => $title,
            "text" => $text,
            "btnOrientation" => 0,
        ];
    }

    public function addMessage(string $key, string $value): Template
    {
        $this->item[] = $key . "：" . $value;
        return $this;
    }
}
