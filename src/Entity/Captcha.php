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
 * Captcha class
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class Captcha
{
    /**
     * @var string The captcha url
     */
    private $url;

    /**
     * @var int The captcha width
     */
    private $width;

    /**
     * @var int The captcha height
     */
    private $height;

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
     * Returns the width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Returns the height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the url
     *
     * @param string $url The captcha url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Sets the width
     *
     * @param int $width The captcha width in pixel
     *
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Sets the height
     *
     * @param int $height The captcha height in pixel
     *
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }
}
