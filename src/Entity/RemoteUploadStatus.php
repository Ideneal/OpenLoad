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
 * RemoteUploadStatus
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class RemoteUploadStatus
{
    const NEW_STATUS         = 'new';
    const DOWNLOADING_STATUS = 'downloading';
    const FINISHED_STATUS    = 'finished';
    const ERROR_STATUS       = 'error';

    /**
     * @var RemoteUpload The remote upload
     */
    private $remoteUpload;

    /**
     * @var string The remote file url
     */
    private $remoteUrl;

    /**
     * @var string The upload status
     */
    private $status;

    /**
     * @var int The loaded bytes
     */
    private $bytesLoaded;

    /**
     * @var int The total bytes
     */
    private $bytesTotal;

    /**
     * @var \DateTime The added date
     */
    private $addedDate;

    /**
     * @var \DateTime The last update date
     */
    private $lastUpdateDate;

    /**
     * @var string The uploaded file id
     */
    private $fileId;

    /**
     * @var string The uploaded file url
     */
    private $url;

    /**
     * Returns the remote upload
     *
     * @return RemoteUpload
     */
    public function getRemoteUpload()
    {
        return $this->remoteUpload;
    }

    /**
     * Returns the remote file url
     *
     * @return string
     */
    public function getRemoteUrl()
    {
        return $this->remoteUrl;
    }

    /**
     * Returns the remote upload status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the loaded bytes
     *
     * @return int
     */
    public function getBytesLoaded()
    {
        return $this->bytesLoaded;
    }

    /**
     * Returns the total bytes
     *
     * @return int
     */
    public function getBytesTotal()
    {
        return $this->bytesTotal;
    }

    /**
     * Returns the added date
     *
     * @return \DateTime
     */
    public function getAddedDate()
    {
        return $this->addedDate;
    }

    /**
     * Returns the last update date
     *
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * Returns the uploaded file id
     *
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Returns the uploaded file url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the remote upload
     *
     * @param RemoteUpload $remoteUpload The remote upload
     *
     * @return $this
     */
    public function setRemoteUpload(RemoteUpload $remoteUpload)
    {
        $this->remoteUpload = $remoteUpload;
        return $this;
    }

    /**
     * Sets the remote file url
     *
     * @param string $remoteUrl The remote file url
     *
     * @return $this
     */
    public function setRemoteUrl($remoteUrl)
    {
        $this->remoteUrl = $remoteUrl;
        return $this;
    }

    /**
     * Sets the remote upload status
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Sets the uploaded bytes
     *
     * @param int $bytesLoaded The loaded bytes
     *
     * @return $this
     */
    public function setBytesLoaded($bytesLoaded)
    {
        $this->bytesLoaded = $bytesLoaded;
        return $this;
    }

    /**
     * Sets the total bytes
     *
     * @param int $bytesTotal The total bytes
     *
     * @return $this
     */
    public function setBytesTotal($bytesTotal)
    {
        $this->bytesTotal = $bytesTotal;
        return $this;
    }

    /**
     * Sets the added date
     *
     * @param \DateTime $addedDate The added date
     *
     * @return $this
     */
    public function setAddedDate(\DateTime $addedDate)
    {
        $this->addedDate = $addedDate;
        return $this;
    }

    /**
     * Sets the last update date
     *
     * @param \DateTime $lastUpdateDate The last update date
     *
     * @return $this
     */
    public function setLastUpdateDate(\DateTime $lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;
        return $this;
    }

    /**
     * Sets the uploaded file id
     *
     * @param string $fileId The uploaded file id
     *
     * @return $this
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * Sets the uploaded file url
     *
     * @param string $url The uploaded file url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}
