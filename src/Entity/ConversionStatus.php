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
 * ConvertStatus
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class ConversionStatus
{
    /**
     * @var string The conversion id
     */
    private $id;

    /**
     * @var string The file name
     */
    private $name;

    /**
     * @var string The conversion status
     */
    private $status;

    /**
     * @var \DateTime The last update date
     */
    private $lastUpdateDate;

    /**
     * @var float The conversion progress
     */
    private $progress;

    /**
     * @var int The conversion retries
     */
    private $retries;

    /**
     * @var string The file url
     */
    private $url;

    /**
     * @var string The file id
     */
    private $fileId;

    /**
     * Returns the conversion id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the file name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the conversion status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
     * Returns the conversion progress
     *
     * @return float
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Returns the conversion retries
     *
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
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
     * Returns the file id
     *
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Sets the conversion id
     *
     * @param string $id The conversion id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the file name
     *
     * @param string $name The file name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Sets the conversion status
     *
     * @param string $status The conversion status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * Sets the conversion progress
     *
     * @param float $progress The conversion progress
     *
     * @return $this
     */
    public function setProgress($progress)
    {
        $this->progress = floatval($progress);
        return $this;
    }

    /**
     * Sets the conversion retries
     *
     * @param int $retries The conversion retries
     *
     * @return $this
     */
    public function setRetries($retries)
    {
        $this->retries = $retries;
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

    /**
     * Sets the file id
     *
     * @param string $fileId The file id
     *
     * @return $this
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }
}
