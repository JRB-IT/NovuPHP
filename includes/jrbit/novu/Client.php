<?php

/**
 * NovuPHP Lib
 * 
 * Copyright (c) 2022, Justin Back <service@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu;

/**
 * Overall Manager
 *
 * @author Justin Back <service@jrbit.de>
 */
class Client {
    /* Library constants */

    public const NOVU_PHP_VERSION = "0.1.0";
    public const CURL_USER_AGENT = "NovuPHP {{ version }} Library";


    public function __construct(
        private string $sApiKey,
        private string $sApiUrl
    ){}

    public static function constructUrl(string $sApiUrl, string $sEndpoint, array $aArgument = [])
    {

        $preConstructed = strtr("{{base}}{{endpoint}}", [
            "{{base}}" => $sApiUrl,
            "{{endpoint}}" => $sEndpoint
            ]);
        return strtr($preConstructed, $aArgument);
    }


    public function Events(): api\Events
    {
        return new api\Events($this->sApiKey, $this->sApiUrl);
    }


    public function Subscribers(): api\Subscribers
    {
        return new api\Subscribers($this->sApiKey, $this->sApiUrl);
    }



}