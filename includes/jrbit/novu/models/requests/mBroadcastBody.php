<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models\requests;

use jrbit\novu;

final class mBroadcastBody extends \stdClass {

    public function __construct(
        private string $sName,
        private array $aPayload,
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

    public function getTransactionId(): ?string
    {
        return $this->sTransactionId;
    }

    public function toArray(): array
    {

        return [
            "name" => $this->getName(),
            "payload" => $this->getPayload(),
            "overrides" => $this->getOverrides(),
            "transactionId" => $this->getTransactionId()
        ];
    }

}
