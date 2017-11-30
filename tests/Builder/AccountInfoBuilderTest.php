<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad\Test\Builder;

use Ideneal\OpenLoad\Builder\AccountInfoBuilder;

/**
 * AccountInfoBuilderTest
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class AccountInfoBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string The account info result fixture
     */
    private $fixture = '{"extid": "extuserid","email": "admin@openload.co","signup_at": "2015-01-09 23:59:54","storage_left": -1,"storage_used": "32922117680","traffic": {"left": -1,"used_24h": 0},"balance": 0}';

    /**
     * Tests the building of the account
     */
    public function testBuildAccountInfo()
    {
        $data    = json_decode($this->fixture, true);
        $account = AccountInfoBuilder::buildAccountInfo($data);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\AccountInfo', $account);
        $this->assertEquals('admin@openload.co', $account->getEmail());
        $this->assertEquals('extuserid', $account->getId());
        $this->assertInstanceOf('\DateTime', $account->getSignupDate());
        $this->assertEquals(-1, $account->getStorageLeft());
        $this->assertEquals('32922117680', $account->getStorageUsed());
        $this->assertEquals(-1, $account->getTrafficLeft());
        $this->assertEquals(0, $account->getTrafficUsed24h());
        $this->assertEquals(0, $account->getBalance());
   }
}
