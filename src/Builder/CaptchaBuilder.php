<?php

/*
 * This file is part of the ideneal/openload library
 *
 * (c) Daniele Pedone <ideneal.ztl@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ideneal\OpenLoad\Builder;

use Ideneal\OpenLoad\Entity\Captcha;

/**
 * CaptchaBuilder
 *
 * @author Daniele Pedone aka Ideneal <ideneal.ztl@gmail.com>
 */
class CaptchaBuilder extends AbstractBuilder
{
    /**
     * Builds the captcha from API response
     *
     * @param string $url    The captcha url
     * @param int    $width  The captcha width
     * @param int    $height The captcha height
     *
     * @return Captcha|null
     */
    public static function buildCaptcha($url, $width, $height)
    {
        $captcha = null;

        if ($url) {
            $captcha = new Captcha();
            $captcha
                ->setUrl($url)
                ->setWidth($width)
                ->setHeight($height);
        }

        return $captcha;
    }
}
