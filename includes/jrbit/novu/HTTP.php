<?php

/**
 * NovuPHP Lib
 * 
 * Copyright (c) 2022, Justin Back <service@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu;

use jrbit\novu;

/**
 * Overall Manager
 *
 * @author Justin Back <service@jrbit.de>
 */
class HTTP {
    /* Library constants */


    public static function PUT(string $sUrl, array $aData = [], array $aHeaders = []): novu\models\MHttpResponse {
        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, $sUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_USERAGENT, strtr(novu\Client::CURL_USER_AGENT, ["{{ version }}" => novu\Client::NOVU_PHP_VERSION]));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
            json_encode($aData)
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders);

        $CURLResponse = curl_exec($ch);
        $CURLResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new novu\models\MHttpResponse(
            $CURLResponse,
            $CURLResponseCode
        );
    }

    public static function POST(string $sUrl, array $aData = [], array $aHeaders = []): novu\models\MHttpResponse {
        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, $sUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, strtr(novu\Client::CURL_USER_AGENT, ["{{ version }}" => novu\Client::NOVU_PHP_VERSION]));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
            http_build_query($aData)
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders);

        $CURLResponse = curl_exec($ch);
        $CURLResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new novu\models\MHttpResponse(
            $CURLResponse,
            $CURLResponseCode
        );
    }

    public static function GET(string $sUrl, array $aHeaders = []): novu\models\MHttpResponse {
        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, $sUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, strtr(novu\Client::CURL_USER_AGENT, ["{{ version }}" => novu\Client::NOVU_PHP_VERSION]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders);

        $CURLResponse = curl_exec($ch);
        $CURLResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new novu\models\MHttpResponse(
            $CURLResponse,
            $CURLResponseCode
        );
    }

    public static function DELETE(string $sUrl, array $aHeaders = []): novu\models\MHttpResponse {
        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, $sUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_USERAGENT, strtr(novu\Client::CURL_USER_AGENT, ["{{ version }}" => novu\Client::NOVU_PHP_VERSION]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $aHeaders);

        $CURLResponse = curl_exec($ch);
        $CURLResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new novu\models\MHttpResponse(
            $CURLResponse,
            $CURLResponseCode
        );
    }

}