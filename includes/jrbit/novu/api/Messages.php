<?php

/**
 * Copyright (c) 2022, Justin Back <service@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\api;


use jrbit\novu;
use jrbit\novu\models\responses\mDeleteMessageResponse;

/**
 *
 * @author Justin Back <service@jrbit.de>
 */
class Messages implements novu\interfaces\IMessages {

    const DELETE_ENDPOINT = "/v1/messages/:messageId";

    public function __construct(
        private string $sApiKey,
        private string $sApiUrl
    ){}

    public function Delete(string $sMessageId): bool
    {

        $Request = novu\HTTP::DELETE(novu\Client::constructUrl($this->sApiUrl, self::DELETE_ENDPOINT, [
            ":messageId" => $sMessageId
            ]
        ), [
            'Authorization: ApiKey ' . $this->sApiKey
        ]);

        return $Request->getCode() == 200;
    }
}
