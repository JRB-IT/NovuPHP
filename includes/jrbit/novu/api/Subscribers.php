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
class Subscribers implements novu\interfaces\ISubscribers {


    const LIST_ENDPOINT = "/v1/subscribers?page=:page";
    const CREATE_ENDPOINT = "/v1/subscribers";
    const CANCEL_EVENT_ENDPOINT = "/v1/events/trigger/:transactionId";

    public function __construct(
        private string $sApiKey,
        private string $sApiUrl
    ){}

    public function List(int $iPage = 0): novu\models\MListSubscriberResponse {

        $Request = novu\HTTP::GET(novu\Client::constructUrl($this->sApiUrl, self::LIST_ENDPOINT, [":page" => $iPage]),
        [
            'Authorization: ApiKey ' . $this->sApiKey
        ]
        );

        $oJson = json_decode($Request->getBody());

        $Subscribers = [];

        foreach($oJson->data as $Subscriber){

            $Subscribers[] = new novu\models\MSubscriber(
                $Subscriber->_id,
                $Subscriber->firstName ?? null,
                $Subscriber->lastName ?? null,
                $Subscriber->email ?? null,
                $Subscriber->phone ?? null,
                $Subscriber->avatar ?? null,
                $Subscriber->subscriberId,
                $Subscriber->channels ?? [],
                $Subscriber->_organizationId,
                $Subscriber->_environmentId
            );


        }

        return new novu\models\MListSubscriberResponse(
            $oJson->page,
            $oJson->totalCount,
            $oJson->pageSize,
            $Subscribers
        );
    }
}
