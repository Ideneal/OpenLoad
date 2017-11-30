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
 * The ticket class to preparing a download
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class Ticket
{
    /**
     * @var string The ticket code
     */
    private $code;

    /**
     * @var Captcha The ticket captcha
     */
    private $captcha;

    /**
     * @var int The wait time to download
     */
    private $waitTime;

    /**
     * @var \DateTime The ticket expiration date
     */
    private $expirationDate;

    /**
     * @var string The file id related to the ticket
     */
    private $fileId;

    /**
     * Returns the ticket code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the ticket captcha
     *
     * @return Captcha
     */
    public function getCaptcha()
    {
        return $this->captcha;
    }

    /**
     * Retuns the wait time to download
     *
     * @return int
     */
    public function getWaitTime()
    {
        return $this->waitTime;
    }

    /**
     * Returns the ticket expiration date
     *
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Returns the file id related to the ticket
     *
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Sets the ticket code
     *
     * @param string $code The ticket code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Sets the ticket captcha
     *
     * @param Captcha $captcha The ticket captcha
     *
     * @return $this
     */
    public function setCaptcha(Captcha $captcha = null)
    {
        $this->captcha = $captcha;
        return $this;
    }

    /**
     * Sets the wait time to download
     *
     * @param int $waitTime The wait time (in seconds) to download
     *
     * @return $this
     */
    public function setWaitTime($waitTime)
    {
        $this->waitTime = $waitTime;
        return $this;
    }

    /**
     * Sets the ticket expiration date
     *
     * @param \DateTime $expirationDate The ticket expiration date
     *
     * @return $this
     */
    public function setExpirationDate(\DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * Sets the file id related to the ticket
     *
     * @param string $fileId The file id
     *
     * @return string
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * To string method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->code;
    }
}
