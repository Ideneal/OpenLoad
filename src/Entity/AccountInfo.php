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
 * Account
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class AccountInfo
{
    /**
     * @var string The account id
     */
    private $id;

    /**
     * @var string The account email
     */
    private $email;

    /**
     * @var \DateTime The account signup date
     */
    private $signupDate;

    /**
     * @var int The storage space wich the account has left
     */
    private $storageLeft;

    /**
     * @var int The storage space used by account
     */
    private $storageUsed;

    /**
     * @var int The traffic wich the account has left
     */
    private $trafficLeft;

    /**
     * @var int The traffic used by account in the last 24 hours
     */
    private $trafficUsed24h;

    /**
     * @var float The account balance
     */
    private $balance;

    /**
     * Returns the account id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the account email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the account signup date
     *
     * @return \DateTime
     */
    public function getSignupDate()
    {
        return $this->signupDate;
    }

    /**
     * Returns the account storage space that he has left.
     * If it's -1 the storage is unlimited.
     *
     * @return int
     */
    public function getStorageLeft()
    {
        return $this->storageLeft;
    }

    /**
     * Returns the account storage space used
     *
     * @return int
     */
    public function getStorageUsed()
    {
        return $this->storageUsed;
    }

    /**
     * Returns the traffic wich the account has left.
     * If it's -1 the traffic is unlimited.
     *
     * @return int
     */
    public function getTrafficLeft()
    {
        return $this->trafficLeft;
    }

    /**
     * Returns the traffic used by account in the last 24 hours
     *
     * @return int
     */
    public function getTrafficUsed24h()
    {
        return $this->trafficUsed24h;
    }

    /**
     * Returns the account balance
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Sets the account id
     *
     * @param string $id The account id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the account email
     *
     * @param string $email The account email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Sets the account signup date
     *
     * @param \DateTime $signupDate The account signup date
     *
     * @return $this
     */
    public function setSignupDate(\DateTime $signupDate)
    {
        $this->signupDate = $signupDate;
        return $this;
    }

    /**
     * Sets the storage space wich account has left
     *
     * @param int $storageLeft The storage space wich account has left
     *
     * @return $this
     */
    public function setStorageLeft($storageLeft)
    {
        $this->storageLeft = $storageLeft;
        return $this;
    }

    /**
     * Sets the storage space used by account
     *
     * @param int $storageUsed The storage space used by account
     *
     * @return $this
     */
    public function setStorageUsed($storageUsed)
    {
        $this->storageUsed = $storageUsed;
        return $this;
    }

    /**
     * Sets the traffic wich account has left
     *
     * @param int $trafficLeft The traffic wich account has left
     *
     * @return $this
     */
    public function setTrafficLeft($trafficLeft)
    {
        $this->trafficLeft = $trafficLeft;
        return $this;
    }

    /**
     * Sets the traffic used by account in the last 24 hours
     *
     * @param int $trafficUsed24h The traffic used by account in the last 24 hours
     *
     * @return $this
     */
    public function setTrafficUsed24h($trafficUsed24h)
    {
        $this->trafficUsed24h = $trafficUsed24h;
        return $this;
    }

    /**
     * Sets the account balance
     *
     * @param float $balance The account balance
     *
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->balance = floatval($balance);
        return $this;
    }
}
