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

use Ideneal\OpenLoad\Entity\ConversionStatus;

/**
 * ConversionStatusBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class ConversionStatusBuilder extends AbstractBuilder
{
    /**
     * Builds a conversion status from the API response
     *
     * @param array $data The response data
     *
     * @return ConversionStatus
     */
    public static function buildConversionStatus(array $data)
    {
        $conversionStatus = new ConversionStatus();
        $conversionStatus
            ->setId($data['id'])
            ->setName($data['name'])
            ->setStatus($data['status'])
            ->setLastUpdateDate(static::buildDate($data['last_update']))
            ->setProgress($data['progress'])
            ->setRetries($data['retries'])
            ->setUrl($data['link'])
            ->setFileId($data['linkextid']);

        return $conversionStatus;
    }
}
