<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models;

use jrbit\novu;

final class MTriggerBody extends \stdClass {

    public function __construct(
        private string $sName,
        private array $aPayload,
        private novu\models\MTriggerTo $mTo,
        private ?string $sTransactionId = null,
        private ?array $aOverrides = null
    ){}

    public function getName(): string
    {
        return $this->sName;
    }

    public function getPayload(): array
    {
        return $this->aPayload;
    }

    public function getOverrides(): ?array
    {
        return $this->aOverrides;
    }

    public function getTo(): novu\models\MTriggerTo
    {
        return $this->mTo;
    }

    public function getTransactionId(): ?string
    {
        return $this->sTransactionId;
    }

    public function toArray(): array
    {

        $oTo = $this->getTo()->toArray();

        if($this->getTo()->getSubscriberId() !== null){
            $oTo = $this->getTo()->getSubscriberId();
        }

        return [
            "name" => $this->getName(),
            "payload" => $this->getPayload(),
            "overrides" => $this->getOverrides(),
            "to" => $oTo,
            "transactionId" => $this->getTransactionId()
        ];
    }

}
