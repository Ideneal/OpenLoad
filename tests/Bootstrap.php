<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (! @include_once __DIR__.'/../vendor/autoload.php') {
    exit("You must set up the project dependencies, run the following commands:\n> wget http://getcomposer.org/composer.phar\n> php composer.phar install\n");
}
