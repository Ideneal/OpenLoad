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

/**
 * AbstractBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
abstract class AbstractBuilder
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * Builds a date from a string
     *
     * @param string $dateString The date string
     *
     * @return \DateTime
     */
    protected static function buildDate($dateString)
    {
        return \DateTime::createFromFormat(static::DATE_FORMAT, $dateString);
    }
}
