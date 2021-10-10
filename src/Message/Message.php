<?php

namespace l1n6yun\DingTalk\Message;

abstract class Message
{
    /**
     * @var array
     */
    protected array $value;

    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * @var array
     */
    protected array $at = [];

    /**
     * @param ...$value
     */
    public function __construct(...$value)
    {
        $this->value = $value;
    }

    public static function make(): Message
    {
        return new static(...func_get_args());
    }

    /**
     * 获取消息类型
     * @return string
     */
    protected abstract function type(): string;

    /**
     * 消息转换为数组
     * @param $value
     * @return array
     */
    protected abstract function transform($value): array;

    /**
     * 装换为数组
     * @return array
     */
    public function toArray(): array
    {
        $message = [
            "msgtype" => $this->type(),
            $this->type() => array_merge($this->transform($this->value), $this->attributes),
        ];

        if (!empty($this->at)) {
            $message['at'] = $this->at;
        }

        return $message;
    }

    /**
     * 转换为JSON
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * 被@人的手机号
     * @param array $mobiles
     * @return $this
     */
    public function atMobiles(array $mobiles): Message
    {
        return $this->setAt('atMobiles', $mobiles);
    }

    /**
     * 被@人的用户userid
     * @param array $userIds
     * @return $this
     */
    public function atUserIds(array $userIds): Message
    {
        return $this->setAt('atUserIds', $userIds);
    }

    /**
     * 是否@所有人。
     * @param bool $isAtAll
     * @return $this
     */
    public function atAll(bool $isAtAll = true): Message
    {
        return $this->setAt('isAtAll', $isAtAll);
    }

    /**
     * @param string $key
     * @param $value
     * @return Message
     */
    protected function setAt(string $key, $value): Message
    {
        $this->at[$key] = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param  $value
     * @return Message
     */
    protected function setAttributes(string $key, $value): Message
    {
        $this->attributes[$key] = $value;

        return $this;
    }

}