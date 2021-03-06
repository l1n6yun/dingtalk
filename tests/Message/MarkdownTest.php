<?php

namespace l1n6yun\DingTalk\Tests\Message;

use l1n6yun\DingTalk\Message\Markdown;
use PHPUnit\Framework\TestCase;

class MarkdownTest extends TestCase
{
    public function testStaticMake()
    {
        $text = <<<EOF
#### 杭州天气 @150XXXXXXXX 
> 9度，西北风1级，空气良89，相对温度73%
> ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)
> ###### 10点20分发布 [天气](https://www.dingtalk.com) 
EOF;

        $message = Markdown::make('杭州天气', $text);
        $message->atMobiles(["180xxxxxx"]);
        $message->atUserIds(["user123"]);
        $message->atAll(false);

        $expected = [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => '杭州天气',
                'text' => $text,
            ],
            'at' => [
                'atMobiles' => ['180xxxxxx',],
                'atUserIds' => ['user123',],
                'isAtAll' => false,
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }

    public function testNew()
    {
        $text = <<<EOF
#### 杭州天气 @150XXXXXXXX 
> 9度，西北风1级，空气良89，相对温度73%
> ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)
> ###### 10点20分发布 [天气](https://www.dingtalk.com)
EOF;

        $message = (new Markdown('杭州天气', $text));
        $message->atMobiles(["180xxxxxx"]);
        $message->atUserIds(["user123"]);
        $message->atAll(false);

        $expected = [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => '杭州天气',
                'text' => $text,
            ],
            'at' => [
                'atMobiles' => ['180xxxxxx',],
                'atUserIds' => ['user123',],
                'isAtAll' => false,
            ],
        ];
        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }
}
