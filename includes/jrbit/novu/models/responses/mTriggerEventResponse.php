<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models\responses;
use jrbit\novu;

final class mTriggerEventResponse extends \stdClass {


    public function __construct(
        private bool $bAcknowledged,
        private string $sStatus,
        private string $sTransactionId
    ){}
    

    public function isAcknowledged(): bool
    {
        return $this->bAcknowledged;
    }

    public function getStatus(): string
    {
        return $this->sStatus;
    }

    public function getTransactionId(): string
    {
        return $this->sTransactionId;
    }

}
