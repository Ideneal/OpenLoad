<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad\Test\Builder;

use Ideneal\OpenLoad\Builder\CaptchaBuilder;
use Ideneal\OpenLoad\Builder\TicketBuilder;
use Ideneal\OpenLoad\Entity\Ticket;
use Ideneal\OpenLoad\Entity\Captcha;
use PHPUnit\Framework\TestCase;

/**
 * TicketBuilderTest
 *
 * @author    Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class TicketBuilderTest extends TestCase
{
    /**
     * @var string The ticket result fixture
     */
    private $fixture = '{"ticket": "72fA-_Lq8Ak~~1440353112~n~~0~nXtN3RI-nsEa28Iq","captcha_url": "https://openload.co/dlcaptcha/b92eY_nfjV4.png","captcha_w": 140,"captcha_h": 70,"wait_time": 10,"valid_until": "2015-08-23 18:20:13"}';

    /**
     * Tests the building of a ticket
     */
    public function testBuildTicket()
    {
        $data   = json_decode($this->fixture, true);
        $ticket = TicketBuilder::buildTicket($data);
        $this->assertInstanceOf(Ticket::class, $ticket);
        $this->assertEquals('72fA-_Lq8Ak~~1440353112~n~~0~nXtN3RI-nsEa28Iq', $ticket->getCode());
        $this->assertInstanceOf(Captcha::class, $ticket->getCaptcha());
        $this->assertEquals(10, $ticket->getWaitTime());
        $this->assertInstanceOf(\DateTime::class, $ticket->getExpirationDate());
    }

    /**
     * Tests the building of captcha within the ticket
     */
    public function testBuildCaptcha()
    {
        $data    = json_decode($this->fixture, true);
        $captcha = CaptchaBuilder::buildCaptcha($data['captcha_url'], $data['captcha_w'], $data['captcha_h']);
        $this->assertInstanceOf(Captcha::class, $captcha);
        $this->assertEquals('https://openload.co/dlcaptcha/b92eY_nfjV4.png', $captcha->getUrl());
        $this->assertEquals(140, $captcha->getWidth());
        $this->assertEquals(70, $captcha->getHeight());
    }

    /**
     * Tests the Ticket should return the file id
     */
    public function testTicketReturnFileId()
    {
        $ticket = new Ticket();
        $ticket->setFileId('4248');
        $this->assertEquals('4248', $ticket->getFileId());
    }

    /**
     * Tests the Ticket should return the ticket code
     */
    public function testTicketReturnTicketCode()
    {
        $ticket = new Ticket();
        $ticket->setCode('72fA-_Lq8Ak~~1440353112~n~~0~nXtN3RI-nsEa28Iq');
        $this->assertEquals('72fA-_Lq8Ak~~1440353112~n~~0~nXtN3RI-nsEa28Iq', $ticket);
    }
}
