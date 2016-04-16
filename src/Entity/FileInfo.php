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
 * RemoteFile
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class FileInfo
{
    /**
     * @var string The file id
     */
    private $id;

    /**
     * @var int The file status code
     */
    private $status;

    /**
     * @var string The file name
     */
    private $name;

    /**
     * @var int The file size
     */
    private $size;

    /**
     * @var string The file sha1
     */
    private $sha1;

    /**
     * @var string The file content type
     */
    private $contentType;

    /**
     * Returns the file id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the file status code
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
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
     * Returns the file size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

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
     * Returns the file content type
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Sets the file id
     *
     * @param string $id The file id.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the file status code
     *
     * @param int $status The file status code
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * Sets the file sha1
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
     * Sets the file content type
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
     * To string method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }
}
