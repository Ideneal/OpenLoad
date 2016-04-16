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

use Ideneal\OpenLoad\Entity\DownloadLink;
use Ideneal\OpenLoad\Entity\UploadLink;

/**
 * DownloadLinkBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class LinkBuilder extends AbstractBuilder
{
    /**
     * Builds the download link from API response
     *
     * @param array $data The response data
     *
     * @return DownloadLink
     */
    public static function buildDownloadLink(array $data)
    {
        $downloadLink = new DownloadLink();
        $downloadLink
            ->setName($data['name'])
            ->setSize($data['size'])
            ->setSha1($data['sha1'])
            ->setContentType($data['content_type'])
            ->setUploadDate(static::buildDate($data['upload_at']))
            ->setUrl($data['url'])
            ->setToken($data['token']);

        return $downloadLink;
    }

    /**
     * Builds the upload link from API response
     *
     * @param array $data The response data
     *
     * @return UploadLink
     */
    public static function buildUploadLink(array $data)
    {
        $uploadLink = new UploadLink();
        $uploadLink
            ->setUrl($data['url'])
            ->setExpirationDate(static::buildDate($data['valid_until']));

        return $uploadLink;
    }
}
