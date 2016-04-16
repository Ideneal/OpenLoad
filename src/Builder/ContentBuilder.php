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

use Ideneal\OpenLoad\Entity\File;
use Ideneal\OpenLoad\Entity\Folder;

/**
 * ContentBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class ContentBuilder extends AbstractBuilder
{
    /**
     * Builds a folder from API response
     *
     * @param array $data The response data
     *
     * @return Folder
     */
    public static function buildFolder(array $data)
    {
        $folder = new Folder();
        $folder
            ->setId($data['id'])
            ->setName($data['name']);

        return $folder;
    }

    /**
     * Builds a file from API response
     *
     * @param array $data The response data
     *
     * @return File
     */
    public static function buildFile(array $data)
    {
        $uploadDate = (new \DateTime())->setTimestamp($data['upload_at']);

        $file = new File();
        $file
            ->setId($data['linkextid'])
            ->setName($data['name'])
            ->setFolderId($data['folderid'])
            ->setUploadDate($uploadDate)
            ->setStatus($data['status'])
            ->setSize($data['size'])
            ->setContentType($data['content_type'])
            ->setDownloadCount($data['download_count'])
            ->setConversionStatus($data['cstatus'])
            ->setUrl($data['link']);

        return $file;
    }
}
