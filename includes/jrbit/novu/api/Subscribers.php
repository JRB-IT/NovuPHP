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
    const DELETE_ENDPOINT = "/v1/subscribers/:subscriberId";
    const UPDATE_ENDPOINT = "/v1/subscribers/:subscriberId";

    public function __construct(
        private string $sApiKey,
        private string $sApiUrl
    ){}


    public function Update(string $sSubscriberId): bool
    {

        $Request = novu\HTTP::DELETE(novu\Client::constructUrl($this->sApiUrl, self::DELETE_ENDPOINT, [
            ":subscriberId" => $sSubscriberId
            ]
        ), [
            'Authorization: ApiKey ' . $this->sApiKey
        ]);

        return $Request->getCode() == 200;
    }

    public function Delete(string $sSubscriberId): bool
    {

        $Request = novu\HTTP::DELETE(novu\Client::constructUrl($this->sApiUrl, self::DELETE_ENDPOINT, [
            ":subscriberId" => $sSubscriberId
            ]
        ), [
            'Authorization: ApiKey ' . $this->sApiKey
        ]);

        return $Request->getCode() == 200;
    }

    public function List(int $iPage = 0): novu\models\responses\mListSubscriberResponse {

        $Request = novu\HTTP::GET(novu\Client::constructUrl($this->sApiUrl, self::LIST_ENDPOINT, [":page" => $iPage]),
        [
            'Authorization: ApiKey ' . $this->sApiKey
        ]
        );

        $oJson = json_decode($Request->getBody());

        $Subscribers = [];

        foreach($oJson->data as $Subscriber){

            $Subscribers[] = new novu\models\mDetailedSubscriber(
                $Subscriber->_id,
                $Subscriber->firstName ?? null,
                $Subscriber->lastName ?? null,
                $Subscriber->email ?? null,
                $Subscriber->phone ?? null,
                $Subscriber->avatar ?? null,
                $Subscriber->subscriberId,
                $Subscriber->channels ?? [],
                $Subscriber->_organizationId,
                $Subscriber->_environmentId,
                $Subscriber->deleted,
                $Subscriber->createdAt,
                $Subscriber->updatedAt,
                $Subscriber->__v,
                $this->sApiKey,
                $this->sApiUrl
            );


        }

        return new novu\models\responses\mListSubscriberResponse(
            $oJson->page,
            $oJson->totalCount,
            $oJson->pageSize,
            $Subscribers
        );
    }
}
