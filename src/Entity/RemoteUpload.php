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
 * RemoteUpload
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class RemoteUpload
{
    /**
     * @var int The remote upload id
     */
    private $id;

    /**
     * @var int The folder id
     */
    private $folderId;

    /**
     * Returns the remote upload id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the folder id
     *
     * @return int
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * Sets the remote upload id
     *
     * @param int $id The remote upload id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the folder id
     *
     * @param int $folderId The folder id
     *
     * @return $this
     */
    public function setFolderId($folderId)
    {
        $this->folderId = $folderId;
        return $this;
    }
}
