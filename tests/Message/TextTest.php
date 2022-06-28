<?php

namespace l1n6yun\DingTalk\Tests\Message;

use l1n6yun\DingTalk\Message\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testStaticMake()
    {
        $message = Text::make('我就是我, @XXX 是不一样的烟火');
        $message->atMobiles(["180xxxxxx"]);
        $message->atUserIds(["user123"]);
        $message->atAll(false);
        $expected = [
            'msgtype' => 'text',
            'text' => [
                'content' => '我就是我, @XXX 是不一样的烟火',
            ],
            'at' => [
                'atMobiles' => ['180xxxxxx'],
                'atUserIds' => ['user123'],
                'isAtAll' => false
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }

    public function testNew()
    {
        $message = (new Text('我就是我, @XXX 是不一样的烟火'))
            ->atMobiles(["180xxxxxx"])
            ->atUserIds(["user123"])
            ->atAll(false);
        $expected = [
            'msgtype' => 'text',
            'text' => [
                'content' => '我就是我, @XXX 是不一样的烟火',
            ],
            'at' => [
                'atMobiles' => ['180xxxxxx'],
                'atUserIds' => ['user123'],
                'isAtAll' => false
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }
}
