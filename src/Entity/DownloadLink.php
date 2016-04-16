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
 * DownloadLink
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class DownloadLink extends AbstractLink
{
    /**
     * @var string The file name to download
     */
    private $name;

    /**
     * @var string The file size to download
     */
    private $size;

    /**
     * @var int The file sha1 to download
     */
    private $sha1;

    /**
     * @var string The file content type to download
     */
    private $contentType;

    /**
     * @var \DateTime The file upload date
     */
    private $uploadDate;

    /**
     * @var string The token of download url
     */
    private $token;

    /**
     * Returns the name of the file to download
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the size of the file to download
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns the sha1 of the file to download
     *
     * @return string
     */
    public function getSha1()
    {
        return $this->sha1;
    }

    /**
     * Returns the content type of the file to download
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
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
     * Returns the token of download url
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets the name of the file to download
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
     * Sets the size of the file to download
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
     * Sets the sha1 of the file to download
     *
     * @param string $sha1 The file sha1
     *
     * @return $this
     */
    public function setSha1($sha1)
    {
        $this->sha1 = $sha1;
        return $this;
    }

    /**
     * Sets the content type of the file to download
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
     * Sets the upload date of file
     *
     * @param \DateTime $uploadDate The upload date of file
     *
     * @return $this
     */
    public function setUploadDate(\DateTime $uploadDate)
    {
        $this->uploadDate = $uploadDate;
        return $this;
    }

    /**
     * Sets the token of download url
     *
     * @param string $token The token of download url
     *
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }
}
