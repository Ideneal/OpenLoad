<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad;

use GuzzleHttp\Client;
use Ideneal\OpenLoad\Builder\AccountInfoBuilder;
use Ideneal\OpenLoad\Builder\ContentBuilder;
use Ideneal\OpenLoad\Builder\ConversionStatusBuilder;
use Ideneal\OpenLoad\Builder\FileInfoBuilder;
use Ideneal\OpenLoad\Builder\LinkBuilder;
use Ideneal\OpenLoad\Builder\RemoteUploadBuilder;
use Ideneal\OpenLoad\Builder\TicketBuilder;
use Ideneal\OpenLoad\Entity\AbstractContent;
use Ideneal\OpenLoad\Entity\AccountInfo;
use Ideneal\OpenLoad\Entity\ConversionStatus;
use Ideneal\OpenLoad\Entity\DownloadLink;
use Ideneal\OpenLoad\Entity\File;
use Ideneal\OpenLoad\Entity\FileInfo;
use Ideneal\OpenLoad\Entity\Folder;
use Ideneal\OpenLoad\Entity\RemoteUpload;
use Ideneal\OpenLoad\Entity\RemoteUploadStatus;
use Ideneal\OpenLoad\Entity\Ticket;
use Ideneal\OpenLoad\Entity\UploadLink;
use Ideneal\OpenLoad\Exception\BadRequestException;
use Ideneal\OpenLoad\Exception\BandwidthUsageExceededException;
use Ideneal\OpenLoad\Exception\FileNotFoundException;
use Ideneal\OpenLoad\Exception\PermissionDeniedException;
use Ideneal\OpenLoad\Exception\ServerException;
use Ideneal\OpenLoad\Exception\UnavailableForLegalReasonsException;
use Psr\Http\Message\ResponseInterface;

/**
 * OpenLoadClient
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class OpenLoadClient
{
    const API_BASE_URL = 'https://api.openload.co';
    const API_VERSION  = 1;

    /**
     * @var string The API login string
     */
    private $login;

    /**
     * @var string The API key string
     */
    private $key;

    /**
     * @var Client The http client
     */
    private $client;

    /**
     * The OpenLoad service client constructor
     *
     * @param string $login The API login string
     * @param string $key   The API key string
     */
    public function __construct($login, $key)
    {
        $this->login = $login;
        $this->key   = $key;

        $baseUri = self::API_BASE_URL . '/'. self::API_VERSION . '/';

        $this->client = new Client(array(
            'base_uri' => $baseUri
        ));
    }

    /**
     * Returns the account info
     *
     * @return AccountInfo
     */
    public function getAccountInfo()
    {
        $params   = $this->getAuthParams();
        $response = $this->processRequest('account/info', $params);
        $result   = $this->processResponse($response);
        return AccountInfoBuilder::buildAccountInfo($result);
    }

    /**
     * Returns the ticket to download a file
     *
     * @param string|FileInfo $file The file id
     *
     * @return Ticket
     */
    public function getTicket($file)
    {
        $params   = ['file' => (string) $file];
        $response = $this->processRequest('file/dlticket', $params);
        $result   = $this->processResponse($response);
        $ticket   = TicketBuilder::buildTicket($result);

        $ticket->setFileId((string) $file);

        return $ticket;
    }

    /**
     * Returns the download link
     *
     * @param Ticket $ticket          The ticket previously generated
     * @param string $captchaResponse The captcha response
     *
     * @return DownloadLink
     */
    public function getDownloadLink(Ticket $ticket, $captchaResponse = null)
    {
        $params = [
            'file' => $ticket->getFileId(),
            'ticket' => $ticket->getCode()
        ];

        if ($captchaResponse) {
            $params['captcha_response'] = $captchaResponse;
        }

        $response = $this->processRequest('file/dl', $params);
        $result   = $this->processResponse($response);

        return LinkBuilder::buildDownloadLink($result);
    }


    /**
     * Returns the files info
     *
     * @param array $files The files id
     *
     * @return FileInfo[]
     */
    public function getFilesInfo(array $files)
    {
        $params = $this->getAuthParams();

        $params['file'] = implode(',', $files);

        $response = $this->processRequest('file/info', $params);
        $results  = $this->processResponse($response);

        $filesInfo = [];
        foreach ($results as $result) {
            $filesInfo[] = FileInfoBuilder::buildFileInfo($result);
        }

        return $filesInfo;
    }

    /**
     * Returns the file info
     *
     * @param string $file The file id
     *
     * @return FileInfo
     */
    public function getFileInfo($file)
    {
        return current($this->getFilesInfo([$file]));
    }

    /**
     * Returns the upload link
     *
     * @param string|Folder $folder   The folder id
     * @param string        $sha1     The sha1 of file to upload
     * @param bool          $httpOnly If this is set to true, use only http upload links
     *
     * @return UploadLink
     */
    public function getUploadLink($folder = null, $sha1 = null, $httpOnly = false)
    {
        $params = $this->getAuthParams();

        if ($folder) {
            $params['folder'] = (string) $folder;
        }

        if ($sha1) {
            $params['sha1'] = (string) $sha1;
        }

        if ($httpOnly) {
            $params['httponly'] = true;
        }

        $response = $this->processRequest('file/ul', $params);
        $result   = $this->processResponse($response);

        return LinkBuilder::buildUploadLink($result);
    }

    /**
     * Uploads a remote file
     *
     * @param string        $url     The remote file url
     * @param string|Folder $folder  The folder id
     * @param array         $headers The request headers
     *
     * @return RemoteUpload
     */
    public function uploadRemoteFile($url, $folder = null, array $headers = array())
    {
        $params = $this->getAuthParams();

        $params['url'] = $url;

        if ($folder) {
            $params['folder'] = (string) $folder;
        }

        foreach ($headers as $name => $header) {
            $params['headers'] .= $name.": ".$header."\n";
        }

        $response = $this->processRequest('remotedl/add', $params);
        $result   = $this->processResponse($response);

        return RemoteUploadBuilder::buildRemoteUpload($result);
    }

    /**
     * Returns the status of the remote upload
     *
     * @param RemoteUpload $remoteUpload The remote upload
     *
     * @return RemoteUploadStatus
     */
    public function getRemoteUploadStatus(RemoteUpload $remoteUpload)
    {
        $params = $this->getAuthParams();
        $params['id'] = $remoteUpload->getId();

        $response = $this->processRequest('remotedl/status', $params);
        $result   = $this->processResponse($response);

        // TODO fix this shit
        if (is_array($result) && count($result) == 1) {
            $result = current($result);
        }

        return RemoteUploadBuilder::buildRemoteUploadStatus($result);
    }

    /**
     * Returns the latest remote upload statuses
     *
     * @param int $limit The maximum number of result (maximum 100)
     *
     * @return RemoteUploadStatus[]
     */
    public function getLatestRemoteUploadStatuses($limit = 5)
    {
        $params = $this->getAuthParams();
        $params['limit'] = max([0, min([$limit, 100])]);

        $response = $this->processRequest('remotedl/status', $params);
        $results  = $this->processResponse($response);

        $status = [];
        foreach ($results as $result) {
            $status[] = RemoteUploadBuilder::buildRemoteUploadStatus($result);
        }

        return $status;
    }

    /**
     * Returns all contents (folder and file) within a folder
     *
     * @param string|Folder $folder The folder id
     *
     * @return AbstractContent[]
     */
    public function getContents($folder = null)
    {
        $params = $this->getAuthParams();

        if ($folder) {
            $params['folder'] = (string) $folder;
        }

        $response = $this->processRequest('file/listfolder', $params);
        $results  = $this->processResponse($response);

        $contents = [];

        foreach ($results['folders'] as $result) {
            $contents[] = ContentBuilder::buildFolder($result);
        }

        foreach ($results['files'] as $result) {
            $contents[] = ContentBuilder::buildFile($result);
        }

        return $contents;
    }

    /**
     * Returns the folders within a folder
     *
     * @param string|Folder $folder The folder id
     *
     * @return Folder[]
     */
    public function getFolders($folder = null)
    {
        $params = $this->getAuthParams();

        if ($folder) {
            $params['folder'] = (string) $folder;
        }

        $response = $this->processRequest('file/listfolder', $params);
        $results  = $this->processResponse($response);

        $contents = [];

        foreach ($results['folders'] as $result) {
            $contents[] = ContentBuilder::buildFolder($result);
        }

        return $contents;
    }

    /**
     * Returns the files within a folder
     *
     * @param string|Folder $folder The folder id
     *
     * @return File[]
     */
    public function getFiles($folder = null)
    {
        $params = $this->getAuthParams();

        if ($folder) {
            $params['folder'] = (string) $folder;
        }

        $response = $this->processRequest('file/listfolder', $params);
        $results  = $this->processResponse($response);

        $contents = [];

        foreach ($results['files'] as $result) {
            $contents[] = ContentBuilder::buildFile($result);
        }

        return $contents;
    }

    /**
     * Searches the folders within a folder with a specific name
     *
     * @param string        $folderName  The folder name
     * @param string|Folder $folder      The folder id
     * @param bool          $recursively Whether search a folder recursively or not
     *
     * @return Folder[]
     */
    public function searchFolders($folderName, $folder = null, $recursively = false)
    {
        $folders = $this->getFolders($folder);
        $result  = [];

        while (!empty($folders)) {
            $folder = array_pop($folders);

            if ($folder->getName() == $folderName) {
                $result[] = $folder;
            }

            if ($recursively) {
                $subFolders = $this->getFolders($folder);
                $folders    = array_merge($folders, $subFolders);
            }
        }

        return $result;
    }

    /**
     * Searches the files within a folder with a specific name
     *
     * @param string          $fileName    The file name
     * @param string|Folder   $folder      The folder id
     * @param bool            $recursively Whether search a file recursively or not
     *
     * @return File[]
     */
    public function searchFiles($fileName, $folder = null, $recursively = false)
    {
        $contents = $recursively ? $this->getContents($folder) : $this->getFiles($folder);
        $result   = [];

        if ($recursively) {
            $subFolders = [];

            while (!empty($contents)) {
                $content = array_pop($contents);

                if ($content instanceof Folder) {
                    $subFolders[] = $content;
                } elseif ($content->getName() == $fileName) {
                    $result[] = $content;
                }

                // Once I've checked each files I get others from subfolders
                if (!empty($contents)) {
                    foreach ($subFolders as $subFolder) {
                        $subContents = $this->getContents($subFolder);
                        $contents    = array_merge($contents, $subContents);
                    }
                    $subFolders = [];
                }
            }
        } else {
            foreach ($contents as $content) {
                if ($content->getName() == $fileName) {
                    $result[] = $content;
                }
            }
        }

        return $result;
    }

    /**
     * Converts a file
     *
     * @param string|File $file The file id
     *
     * @return boolean
     */
    public function convertFile($file)
    {
        $params = $this->getAuthParams();
        $params['file'] = (string) $file;

        $response = $this->processRequest('file/convert', $params);
        $result   = $this->processResponse($response);

        return $result;
    }

    /**
     * Returns the running conversions
     *
     * @param string|Folder $folder The folder id
     *
     * @return ConversionStatus[]
     */
    public function getRunningConversions($folder = null)
    {
        $params = $this->getAuthParams();

        if ($folder) {
            $params['folder'] = (string) $folder;
        }

        $response = $this->processRequest('file/runningconverts', $params);
        $results  = $this->processResponse($response);

        $conversions = [];

        foreach ($results as $result) {
            $conversions[] = ConversionStatusBuilder::buildConversionStatus($result);
        }

        return $conversions;
    }

    /**
     * Returns the url of video splash image
     *
     * @param string|File $file The file id
     *
     * @return string
     */
    public function getVideoSplashImage($file)
    {
        $params = $this->getAuthParams();
        $params['file'] = (string) $file;

        $response = $this->processRequest('file/getsplash', $params);
        $result   = $this->processResponse($response);

        return $result;
    }

    /**
     * Uploads a file
     *
     * @param string        $fileName The file name of the file to upload
     * @param string|Folder $folder   The folder id where upload the file
     * @param bool          $httpOnly If this is set to true, use only http upload links
     *
     * @return mixed
     */
    public function uploadFile($fileName, $folder = null, $httpOnly = false)
    {
        $file = fopen($fileName, 'r');
        $sha1 = sha1_file($fileName);

        $uploadLink = $this->getUploadLink($folder, $sha1, $httpOnly);

        $response = $this->client->request('POST', $uploadLink->getUrl(), [
            'multipart' => [
                [
                    'name'     => basename($fileName),
                    'contents' => $file
                ]
            ]
        ]);

        return $this->processResponse($response);
    }

    /**
     * Processes the OpenLoad API request
     *
     * @param string $uri        The request uri
     * @param array  $parameters The parameters array
     *
     * @return ResponseInterface
     */
    protected function processRequest($uri, array $parameters)
    {
        return $this->client->get($uri, array(
            'query' => $parameters
        ));
    }

    /**
     * Processes the OpenLoad API response and returns the result
     *
     * @param ResponseInterface $response The OpenLoad API response
     *
     * @return mixed
     *
     * @throws BadRequestException
     * @throws PermissionDeniedException
     * @throws FileNotFoundException
     * @throws UnavailableForLegalReasonsException
     * @throws BandwidthUsageExceededException
     * @throws ServerException
     */
    protected function processResponse(ResponseInterface $response)
    {
        $json = $response->getBody();
        $data = json_decode($json, true);

        $msg = $data['msg'];

        if ($data['status'] >= 300) {
            switch ($data['status']) {
                case 400:
                    throw new BadRequestException($msg);
                case 403:
                    throw new PermissionDeniedException($msg);
                case 404:
                    throw new FileNotFoundException($msg);
                case 451:
                    throw new UnavailableForLegalReasonsException($msg);
                case 509:
                    throw new BandwidthUsageExceededException($msg);
                default :
                    throw new ServerException($msg);
            }
        }

        return $data['result'];
    }

    /**
     * Returns the authentication parameters
     *
     * @return array
     */
    protected function getAuthParams()
    {
        return array(
            'login' => $this->login,
            'key'   => $this->key
        );
    }
}
