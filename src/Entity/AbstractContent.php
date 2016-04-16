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
 * AbstractContent
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
abstract class AbstractContent
{
    /**
     * @var string The content id
     */
    protected $id;

    /**
     * @var string The content name
     */
    protected $name;

    /**
     * Returns the content id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the content name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the content id
     *
     * @param string $id The content id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the content name
     *
     * @param string $name The content name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
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
