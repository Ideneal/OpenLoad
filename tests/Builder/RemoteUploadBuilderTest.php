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

use Ideneal\OpenLoad\Builder\RemoteUploadBuilder;
use Ideneal\OpenLoad\Entity\RemoteUpload;

/**
 * RemoteUploadBuilderTest
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class RemoteUploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string The remote upload result fixture
     */
    private $fixtureUpload = '{"id": "12","folderid": "4248"}';

    /**
     * @var string The remote upload status result fixture
     */
    private $fixtureStatus = '{"id": 24,"remoteurl": "http://proof.ovh.net/files/100Mio.dat","status": "new","bytes_loaded": null,"bytes_total": null,"folderid": "4248","added": "2015-02-21 09:20:26","last_update": "2015-02-21 09:20:26","extid": false,"url": false}';

    /**
     * Tests the building of the remote upload
     */
    public function testBuildRemoteUpload()
    {
        $data   = json_decode($this->fixtureUpload, true);
        $upload = RemoteUploadBuilder::buildRemoteUpload($data);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\RemoteUpload', $upload);
        $this->assertEquals('4248', $upload->getFolderId());
    }

    /**
     * Tests the building of the remote upload status
     */
    public function testBuildRemoteUploadStatus()
    {
        $data   = json_decode($this->fixtureStatus, true);
        $status = RemoteUploadBuilder::buildRemoteUploadStatus($data);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\RemoteUploadStatus', $status);
        $this->assertInstanceOf('Ideneal\OpenLoad\Entity\RemoteUpload', $status->getRemoteUpload());
        $this->assertEquals('http://proof.ovh.net/files/100Mio.dat', $status->getRemoteUrl());
        $this->assertEquals('new', $status->getStatus());
        $this->assertNull($status->getBytesLoaded());
        $this->assertNull($status->getBytesTotal());
        $this->assertInstanceOf('\DateTime', $status->getAddedDate());
        $this->assertInstanceOf('\DateTime', $status->getLastUpdateDate());
        $this->assertFalse($status->getFileId());
        $this->assertFalse($status->getUrl());
    }

    /**
     * Tests the RemoteUpload should return the upload id
     */
    public function testRemoteUploadReturnUploadId()
    {
        $upload = new RemoteUpload();
        $upload->setId('4248');
        $this->assertEquals('4248', $upload->getId());
    }
}
