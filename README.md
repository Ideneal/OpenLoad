# OpenLoad

[![Packagist](https://img.shields.io/packagist/v/ideneal/openload.svg?style=flat-square)](https://packagist.org/packages/ideneal/openload)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/Ideneal/OpenLoad/master/LICENSE)
[![Travis branch](https://img.shields.io/travis/Ideneal/OpenLoad/master.svg?style=flat-square)](https://travis-ci.org/Ideneal/OpenLoad)
[![Codacy branch](https://img.shields.io/codacy/cbb3c5818734481bba83a1ecbf9e0f28/master.svg?style=flat-square)](https://www.codacy.com/app/ideneal-ztl/OpenLoad)

It's just a php client of the [OpenLoad.co](https://openload.co/) service.

## Install

```
composer require ideneal/openload:~1.1
```

## Usage
All api features are been implemented.

### Get account info

You can retrieve your account info by using `getAccountInfo` method.

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$accountInfo = $openload->getAccountInfo();
echo $accountInfo->getEmail(); //account@email.com
```

### Get a ticket to download a file

In order to retrieve a ticket to download a file you have to use
the `getTicket` method and pass it the remote file you want to get the ticket.
The remote file has to be a FileInfo object or the file id.

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$fileInfo = $openload->getFileInfo('72fA-_Lq8Ak');
$ticket   = $openload->getTicket($fileInfo);

// ...
// After read the captcha response from $ticket->getCaptcha()->getUrl()

$downloadLink = $openload->getDownloadLink($ticket, $captchaResponse);
```

### Upload a file

You can upload a file by using `uploadFile` method.

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$openload->uploadFile('/home/user/Pictures/image.jpg');
```

### Search files with a specific name

You can use `searchFiles` method to search a file by its name.
The first parameter is the file name, 
the second is a folder id (default null)
and the third parameter defines whether the search has to be recursive or not (default false)

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$files = $openLoad->searchFiles('video.mp4', null, true);
```

### Search folders with a specific name

You can use `searchFolders` method to search a folder by its name.
The first parameter is the folder name, 
the second is a folder id (default null)
and the third parameter defines whether the search has to be recursive or not (default false)

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$folders = $openLoad->searchFolders('movies', null, true);
```

It's also possible find more about what you can to do at [OpenLoad Api](https://openload.co/api).

## Author

Daniele Pedone

## License

MIT

