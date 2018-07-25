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

use Ideneal\OpenLoad\Builder\ConversionStatusBuilder;
use Ideneal\OpenLoad\Entity\ConversionStatus;
use PHPUnit\Framework\TestCase;

/**
 * ConversionStatusBuilderTest
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class ConversionStatusBuilderTest extends TestCase
{
    /**
     * @var string The conversion status result fixture
     */
    private $fixture = '{"name": "Geysir.AVI","id": "3565411","status": "pending","last_update": "2015-08-23 19:41:40","progress": 0.32,"retries": "0","link": "https://openload.co/f/f02JFG293J8/Geysir.AVI","linkextid": "f02JFG293J8"}';

    /**
     * Tests the building of the conversion status
     */
    public function testBuildConversionStatus()
    {
        $data   = json_decode($this->fixture, true);
        $status = ConversionStatusBuilder::buildConversionStatus($data);
        $this->assertInstanceOf(ConversionStatus::class, $status);
        $this->assertEquals('3565411', $status->getId());
        $this->assertEquals('Geysir.AVI', $status->getName());
        $this->assertEquals('pending', $status->getStatus());
        $this->assertInstanceOf(\DateTime::class, $status->getLastUpdateDate());
        $this->assertEquals(0.32, $status->getProgress());
        $this->assertEquals('0', $status->getRetries());
        $this->assertEquals('https://openload.co/f/f02JFG293J8/Geysir.AVI', $status->getUrl());
        $this->assertEquals('f02JFG293J8', $status->getFileId());
    }
}
