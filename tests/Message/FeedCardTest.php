<?php

namespace l1n6yun\DingTalk\Tests\Message;

use l1n6yun\DingTalk\Message\FeedCard;
use PHPUnit\Framework\TestCase;

class FeedCardTest extends TestCase
{
    public function testStaticMake()
    {
        $title = "时代的火车向前开1";
        $messageURL = "https://www.dingtalk.com/";
        $picURL = "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png";

        $message = FeedCard::make([[
            "title" => $title,
            "messageURL" => $messageURL,
            "picURL" => $picURL
        ]])->addLinks($title, $messageURL, $picURL)
            ->addLinks($title, $messageURL, $picURL);
        $expected = [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => [
                    [
                        'title' => '时代的火车向前开1',
                        'messageURL' => 'https://www.dingtalk.com/',
                        'picURL' => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png',
                    ],
                    [
                        'title' => '时代的火车向前开1',
                        'messageURL' => 'https://www.dingtalk.com/',
                        'picURL' => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png',
                    ],
                    [
                        'title' => '时代的火车向前开1',
                        'messageURL' => 'https://www.dingtalk.com/',
                        'picURL' => 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png',
                    ],
                ],
            ]];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }

    public function testNew()
    {
        $title = "时代的火车向前开1";
        $messageURL = "https://www.dingtalk.com/";
        $picURL = "https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png";

        $message = (new FeedCard([[
            "title" => $title,
            "messageURL" => $messageURL,
            "picURL" => $picURL
        ]]))->addLinks($title, $messageURL, $picURL)
            ->addLinks($title, $messageURL, $picURL);
        $expected = [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => [
                    [
                        'title' => $title,
                        'messageURL' => $messageURL,
                        'picURL' => $picURL,
                    ],
                    [
                        'title' => $title,
                        'messageURL' => $messageURL,
                        'picURL' => $picURL,
                    ],
                    [
                        'title' => $title,
                        'messageURL' => $messageURL,
                        'picURL' => $picURL,
                    ],
                ],
            ]];

        $this->assertSame($expected, $message->toArray());
        $this->assertSame(json_encode($expected), $message->toJson());
    }
}
