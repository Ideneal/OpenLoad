<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad\Entity;

/**
 * File
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class File extends AbstractContent
{
    /**
     * @var string The file sha1
     */
    private $sha1;

    /**
     * @var string The folder id
     */
    private $folderId;

    /**
     * @var \DateTime The upload date
     */
    private $uploadDate;

    /**
     * @var string The file status
     */
    private $status;

    /**
     * @var int The file size
     */
    private $size;

    /**
     * @var string The file content type
     */
    private $contentType;

    /**
     * @var int The file download count
     */
    private $downloadCount;

    /**
     * @var string The file conversion status
     */
    private $conversionStatus;

    /**
     * @var string The file url
     */
    private $url;

    /**
     * Returns the file sha1
     *
     * @return string
     */
    public function getSha1()
    {
        return $this->sha1;
    }

    /**
     * Returns the folder id
     *
     * @return string
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * Returns the file upload date
     *
     * @return \DateTime
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Returns the file status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the file size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns the file content type
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Returns the file download count
     *
     * @return int
     */
    public function getDownloadCount()
    {
        return $this->downloadCount;
    }

    /**
     * Returns the file conversation status
     *
     * @return string
     */
    public function getConversionStatus()
    {
        return $this->conversionStatus;
    }

    /**
     * Returns the file url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the file sha1
     *
     * @param string $sha1 The sha1 of the file
     *
     * @return $this
     */
    public function setSha1($sha1)
    {
        $this->sha1 = $sha1;
        return $this;
    }

    /**
     * Sets the folder id
     *
     * @param string $folderId
     *
     * @return $this
     */
    public function setFolderId($folderId)
    {
        $this->folderId = $folderId;
        return $this;
    }

    /**
     * Sets the upload date
     *
     * @param \DateTime $uploadDate The upload date
     *
     * @return $this
     */
    public function setUploadDate(\DateTime $uploadDate)
    {
        $this->uploadDate = $uploadDate;
        return $this;
    }

    /**
     * Sets the file status
     *
     * @param string $status The file status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Sets the file size
     *
     * @param int $size The file size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * Sets the content type
     *
     * @param string $contentType The file content type
     *
     * @return $this
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * Sets the file download count
     *
     * @param int $downloadCount The file download count
     *
     * @return $this
     */
    public function setDownloadCount($downloadCount)
    {
        $this->downloadCount = $downloadCount;
        return $this;
    }

    /**
     * Sets the file conversation status
     *
     * @param string $conversionStatus The conversation status
     *
     * @return $this
     */
    public function setConversionStatus($conversionStatus)
    {
        $this->conversionStatus = $conversionStatus;
        return $this;
    }

    /**
     * Sets the file url
     *
     * @param string $url The file url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
