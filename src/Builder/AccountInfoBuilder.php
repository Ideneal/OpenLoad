<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad\Builder;

use Ideneal\OpenLoad\Entity\AccountInfo;

/**
 * AccountBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class AccountInfoBuilder extends AbstractBuilder
{
    /**
     * Builds an account from API response
     *
     * @param array $data The API response data
     *
     * @return AccountInfo
     */
    public static function buildAccountInfo(array $data)
    {
        $account = new AccountInfo();
        $account
            ->setId($data['extid'])
            ->setEmail($data['email'])
            ->setSignupDate(static::buildDate($data['signup_at']))
            ->setStorageLeft($data['storage_left'])
            ->setStorageUsed($data['storage_used'])
            ->setTrafficLeft($data['traffic']['left'])
            ->setTrafficUsed24h($data['traffic']['used_24h'])
            ->setBalance($data['balance']);

        return $account;
    }
}
