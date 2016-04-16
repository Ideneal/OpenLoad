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
 * AbstractLink
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class AbstractLink
{
    /**
     * @var string The link url
     */
    protected $url;

    /**
     * Returns the url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the url
     *
     * @param string $url The url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * To string method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->url;
    }
}
