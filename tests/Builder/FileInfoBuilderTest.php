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

use Ideneal\OpenLoad\Builder\FileInfoBuilder;

/**
 * FileInfoBuilderTest
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class FileInfoBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string The file info result fixture
     */
    private $fixture = '{"id": "72fA-_Lq8Ak3","status": 200,"name": "The quick brown fox.txt","size": 123456789012,"sha1": "2fd4e1c67a2d28fced849ee1bb76e7391b93eb12","content_type": "plain/text"}';

    /**
     * Tests the building of the file info
     */
    public function testBuildFileInfo()
    {
        $data     = json_decode($this->fixture, true);
        $fileInfo = FileInfoBuilder::buildFileInfo($data);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\FileInfo', $fileInfo);
    }
}
