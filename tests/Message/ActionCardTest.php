<?php

namespace l1n6yun\DingTalk\Tests\Message;

use l1n6yun\DingTalk\Message\ActionCard;
use PHPUnit\Framework\TestCase;

class ActionCardTest extends TestCase
{
    public function testStaticMake()
    {
        $title = '乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身';
        $text = "![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png) \n### 乔布斯 20 年前想打造的苹果咖啡厅\nApple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划";
        $message = ActionCard::make($title, $text, 0)
            ->setSingleTitle('阅读全文')
            ->setSingleURL('https://www.dingtalk.com');
        $expected = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => $title,
                'text' => $text,
                'btnOrientation' => 0,
                'singleTitle' => '阅读全文',
                'singleURL' => 'https://www.dingtalk.com',
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }

    public function testNew()
    {
        $title = '乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身';
        $text = "![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png) \n### 乔布斯 20 年前想打造的苹果咖啡厅\nApple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划";
        $message = (new ActionCard($title, $text, 0))
            ->setSingleTitle('阅读全文')
            ->setSingleURL('https://www.dingtalk.com');
        $expected = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => $title,
                'text' => $text,
                'btnOrientation' => 0,
                'singleTitle' => '阅读全文',
                'singleURL' => 'https://www.dingtalk.com',
            ],
        ];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }
}
