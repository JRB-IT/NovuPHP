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
        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, novu\Client::constructUrl($this->sApiUrl, self::TRIGGER_ENDPOINT));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
            http_build_query($mBody->toArray())
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: ApiKey ' . $this->sApiKey
        ));

        $CURLResponse = curl_exec($ch);
        $CURLResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        if ($CURLResponseCode != 201) {
            throw new \Exception("$CURLResponseCode Request Error.");
        }


        $oJson = json_decode($CURLResponse)->data;


        return new novu\models\MTriggerEventResponse(
            $oJson->acknowledged, 
            $oJson->status, 
            $oJson->transactionId
        );
    }


    public function Broadcast(novu\models\MBroadcastBody $mBody): novu\models\MBroadcastEventResponse {
        $ch = \curl_init();

        curl_setopt($ch, CURLOPT_URL, novu\Client::constructUrl($this->sApiUrl, self::BROADCAST_ENDPOINT));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
            http_build_query($mBody->toArray())
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: ApiKey ' . $this->sApiKey
        ));

        $CURLResponse = curl_exec($ch);
        $CURLResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        if ($CURLResponseCode != 201) {
            throw new \Exception("$CURLResponseCode Request Error.");
        }


        $oJson = json_decode($CURLResponse)->data;


        return new novu\models\MBroadcastEventResponse(
            $oJson->acknowledged, 
            $oJson->status, 
            $oJson->transactionId
        );
    }

}
