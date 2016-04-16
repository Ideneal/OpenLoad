<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad\Builder;

use Ideneal\OpenLoad\Entity\Ticket;

/**
 * TicketBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class TicketBuilder extends AbstractBuilder
{
    /**
     * Builds a ticket from API response
     *
     * @param array $data The data from API
     *
     * @return Ticket
     */
    public static function buildTicket(array $data)
    {
        $ticket  = new Ticket();
        $captcha = CaptchaBuilder::buildCaptcha($data['captcha_url'], $data['captcha_w'], $data['captcha_h']);

        $ticket
            ->setCode($data['ticket'])
            ->setCaptcha($captcha)
            ->setWaitTime($data['wait_time'])
            ->setExpirationDate(static::buildDate($data['valid_until']));

        return $ticket;
    }
}
