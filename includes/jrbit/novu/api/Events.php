<?php

/**
 * Copyright (c) 2022, Justin Back <service@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\api;


use jrbit\novu;

/**
 *
 * @author Justin Back <service@jrbit.de>
 */
class Events implements novu\interfaces\IEvents {


    const TRIGGER_ENDPOINT = "/v1/events/trigger";
    const BROADCAST_ENDPOINT = "/v1/events/trigger/broadcast";
    const CANCEL_EVENT_ENDPOINT = "/v1/events/trigger/:transactionId";

    public function __construct(
        private string $sApiKey,
        private string $sApiUrl
    ){}

    public function Trigger(novu\models\MTriggerBody $mBody): novu\models\MTriggerEventResponse {

        $Request = novu\HTTP::POST(novu\Client::constructUrl($this->sApiUrl, self::TRIGGER_ENDPOINT, []),
        $mBody->toArray(),
        [
            'Authorization: ApiKey ' . $this->sApiKey
        ]
        );

        if ($Request->getCode() != 201) {
            throw new \Exception($Request->getCode() . " Request Error.");
        }


        $oJson = json_decode($Request->getBody())->data;


        return new novu\models\MTriggerEventResponse(
            $oJson->acknowledged, 
            $oJson->status, 
            $oJson->transactionId
        );
    }


    public function Broadcast(novu\models\MBroadcastBody $mBody): novu\models\MBroadcastEventResponse {

        $Request = novu\HTTP::POST(novu\Client::constructUrl($this->sApiUrl, self::BROADCAST_ENDPOINT, []),
        $mBody->toArray(),
        [
            'Authorization: ApiKey ' . $this->sApiKey
        ]
        );


        if ($Request->getCode() != 201) {
            throw new \Exception($Request->getCode() . " Request Error.");
        }


        $oJson = json_decode($Request->getBody())->data;


        return new novu\models\MBroadcastEventResponse(
            $oJson->acknowledged, 
            $oJson->status, 
            $oJson->transactionId
        );
    }

    public function Cancel(string $sTransactionId): bool {

        $Request = novu\HTTP::DELETE(novu\Client::constructUrl($this->sApiUrl, self::CANCEL_EVENT_ENDPOINT, [
            ":transactionId" => $sTransactionId
            ]
        ), [
            'Authorization: ApiKey ' . $this->sApiKey
        ]);

        return $Request->getCode() == 200;
    }

}
