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
use Ideneal\OpenLoad\Entity\FileInfo;

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
        $this->assertEquals('72fA-_Lq8Ak3', $fileInfo->getId());
        $this->assertEquals('200', $fileInfo->getStatus());
        $this->assertEquals('The quick brown fox.txt', $fileInfo->getName());
        $this->assertEquals(123456789012, $fileInfo->getSize());
        $this->assertEquals('2fd4e1c67a2d28fced849ee1bb76e7391b93eb12', $fileInfo->getSha1());
        $this->assertEquals('plain/text', $fileInfo->getContentType());
    }

    /**
     * Tests the FileInfo should return the id
     */
    public function testFileInfoReturnFileInfoId()
    {
        $fileInfo = new FileInfo();
        $fileInfo->setId('72fA-_Lq8Ak3');
        $this->assertEquals('72fA-_Lq8Ak3', $fileInfo);
    }
}
