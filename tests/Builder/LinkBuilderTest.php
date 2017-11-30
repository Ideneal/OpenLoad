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

use Ideneal\OpenLoad\Builder\LinkBuilder;
use Ideneal\OpenLoad\Entity\DownloadLink;

/**
 * LinkBuilderTest
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class LinkBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string The upload link result fixture
     */
    private $uploadFixture = '{"url": "https://13abc37.example.com/ul/fCgaPthr_ys","valid_until": "2015-01-09 00:02:50"}';

    /**
     * @var string The download link result fixture
     */
    private $downloadFixture = '{"name": "The quick brown fox.txt","size": 12345,"sha1": "2fd4e1c67a2d28fced849ee1bb76e7391b93eb12","content_type": "plain/text","upload_at": "2011-01-26 13:33:37","url": "https://abvzps.example.com/dl/l/4spxX_-cSO4/The+quick+brown+fox.txt","token": "4spxX_-cSO4"}';

    /**
     * Tests the building of the upload link
     */
    public function testBuildUploadLink()
    {
        $data       = json_decode($this->uploadFixture, true);
        $uploadLink = LinkBuilder::buildUploadLink($data);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\UploadLink', $uploadLink);
        $this->assertInstanceOf('\DateTime', $uploadLink->getExpirationDate(new \DateTime('2011-01-26 13:33:37')));
        $this->assertEquals('https://13abc37.example.com/ul/fCgaPthr_ys', $uploadLink->getUrl());
    }

    /**
     * Tests the building of the download link
     */
    public function testBuildDownloadLink()
    {
        $data         = json_decode($this->downloadFixture, true);
        $downloadLink = LinkBuilder::buildDownloadLink($data);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\DownloadLink', $downloadLink);
        $this->assertEquals('The quick brown fox.txt', $downloadLink->getName());
        $this->assertEquals(12345, $downloadLink->getSize());
        $this->assertEquals('2fd4e1c67a2d28fced849ee1bb76e7391b93eb12', $downloadLink->getSha1());
        $this->assertEquals('plain/text', $downloadLink->getContentType());
        $this->assertInstanceOf('\DateTime', $downloadLink->getUploadDate());
        $this->assertEquals('4spxX_-cSO4', $downloadLink->getToken());
        $this->assertEquals('https://abvzps.example.com/dl/l/4spxX_-cSO4/The+quick+brown+fox.txt', $downloadLink->getUrl());
    }

    /**
     * Tests the DownloadLink should return the url string
     */
    public function testDownloadLinkReturnString()
    {
        $downloadLink = new DownloadLink();
        $downloadLink->setUrl('https://abvzps.example.com/dl/l/4spxX_-cSO4/The+quick+brown+fox.txt');
        $this->assertEquals('https://abvzps.example.com/dl/l/4spxX_-cSO4/The+quick+brown+fox.txt', $downloadLink);
    }
}
