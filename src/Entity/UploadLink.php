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
 * UploadLink
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class UploadLink extends AbstractLink
{
    /**
     * @var \DateTime The expiration date
     */
    private $expirationDate;

    /**
     * Returns the expiration date
     *
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Sets the expiration date
     *
     * @param \DateTime $expirationDate The expiration date
     *
     * @return $this
     */
    public function setExpirationDate(\DateTime $expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
}
