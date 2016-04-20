# OpenLoad

[![Packagist](https://img.shields.io/packagist/v/ideneal/openload.svg?style=flat-square)](https://packagist.org/packages/ideneal/openload)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/Ideneal/OpenLoad/master/LICENSE)
[![Travis branch](https://img.shields.io/travis/Ideneal/OpenLoad/master.svg?style=flat-square)](https://travis-ci.org/Ideneal/OpenLoad)
[![Codacy branch](https://img.shields.io/codacy/cbb3c5818734481bba83a1ecbf9e0f28/master.svg?style=flat-square)](https://www.codacy.com/app/ideneal-ztl/OpenLoad)

It's just a php client of the [OpenLoad.co](https://openload.co/) service.

## Install

```
composer require ideneal/openload:~1.0
```

## Usage

All api features are implemented, from retrieve account info

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$accountInfo = $openload->getAccountInfo();
echo $accountInfo->getEmail(); //account@email.com
```

to upload a file

```php
<?php

include_once './vendor/autoload.php';

use Ideneal\OpenLoad\OpenLoadClient;

$openload = new OpenLoadClient('apiLogin', 'apiKey');

$openload->uploadFile('/home/user/Pictures/image.jpg');
```

It's also possible find more about what you can to do at [OpenLoad Api](https://openload.co/api).

## Author

Daniele Pedone

## License

MIT

