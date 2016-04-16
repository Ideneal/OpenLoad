# OpenLoad

[![Build Status]https://travis-ci.org/Ideneal/OpenLoad.svg?branch=master)](https://travis-ci.org/Ideneal/OpenLoad)

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

$acccountInfo = $openload->getAccountInfo();
echo $acccountInfo->getEmail(); //account@email.com
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

