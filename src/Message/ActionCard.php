<?php

namespace l1n6yun\DingTalk\Message;

/**
 * @method static $this make(string $title, string $text, string $btnOrientation)
 */
class ActionCard extends Message
{
    public function addBtn($title, $actionURL): ActionCard
    {
        $this->attributes['btns'][] = [
            "title" => $title,
            "actionURL" => $actionURL
        ];
        return $this;
    }

    protected function type(): string
    {
        return 'actionCard';
    }

    public function setSingleTitle(string $value): ActionCard
    {
        return $this->setAttributes('singleTitle', $value);
    }

    public function setSingleURL(string $value): ActionCard
    {
        return $this->setAttributes('singleURL', $value);
    }

    public function setBtns(array $array): ActionCard
    {
        return $this->setAttributes('btns', $array);
    }

    protected function transform($value): array
    {
        list($title, $text, $btnOrientation) = $value;

        return [
            "title" => $title,
            "text" => $text,
            "btnOrientation" => $btnOrientation,
        ];
    }

}