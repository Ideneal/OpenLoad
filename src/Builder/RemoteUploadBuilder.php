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

use Ideneal\OpenLoad\Entity\RemoteUpload;
use Ideneal\OpenLoad\Entity\RemoteUploadStatus;

/**
 * RemoteUploadBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class RemoteUploadBuilder extends AbstractBuilder
{
    /**
     * Builds the remote upload from API response
     *
     * @param array $data The response result data
     *
     * @return RemoteUpload
     */
    public static function buildRemoteUpload(array $data)
    {
        $remoteUpload = new RemoteUpload();
        $remoteUpload
            ->setId($data['id'])
            ->setFolderId($data['folderid']);

        return $remoteUpload;
    }

    /**
     * Builds the remote upload status from API response
     *
     * @param array $data The response result data
     *
     * @return RemoteUploadStatus
     */
    public static function buildRemoteUploadStatus(array $data)
    {
        $remoteUpload       = static::buildRemoteUpload($data);
        $remoteUploadStatus = new RemoteUploadStatus();

        $remoteUploadStatus
            ->setRemoteUpload($remoteUpload)
            ->setRemoteUrl($data['remoteurl'])
            ->setStatus($data['status'])
            ->setBytesLoaded($data['bytes_loaded'])
            ->setBytesTotal($data['bytes_total'])
            ->setAddedDate(static::buildDate($data['added']))
            ->setLastUpdateDate(static::buildDate($data['last_update']))
            ->setFileId($data['extid'])
            ->setUrl($data['url']);

        return $remoteUploadStatus;
    }
}
