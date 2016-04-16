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

/**
 * TicketBuilderTest
 *
 * @author    Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class TicketBuilderTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\Ticket', $ticket);
    }

    /**
     * Tests the building of captcha within the ticket
     */
    public function testBuildCaptcha()
    {
        $data    = json_decode($this->fixture, true);
        $captcha = CaptchaBuilder::buildCaptcha($data['captcha_url'], $data['captcha_w'], $data['captcha_h']);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\Captcha', $captcha);
    }
}
