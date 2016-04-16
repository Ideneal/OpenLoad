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

use Ideneal\OpenLoad\Entity\FileInfo;

/**
 * FileInfoBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class FileInfoBuilder extends AbstractBuilder
{
    /**
     * Builds the file info from API response
     *
     * @param array $data The response data
     *
     * @return FileInfo
     */
    public static function buildFileInfo(array $data)
    {
        $fileInfo = new FileInfo();
        $fileInfo
            ->setId($data['id'])
            ->setStatus($data['status'])
            ->setName($data['name'])
            ->setSize($data['size'])
            ->setSha1($data['sha1'])
            ->setContentType($data['content_type']);

        return $fileInfo;
    }
}
