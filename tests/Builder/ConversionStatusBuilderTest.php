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

/**
 * ConversionStatusBuilderTest
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class ConversionStatusBuilderTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\ConversionStatus', $status);
    }
}
