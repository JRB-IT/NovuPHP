<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models\responses;
use jrbit\novu;

final class mDeleteMessageResponse extends \stdClass {


    public function __construct(
        private bool $bAcknowledged,
        private string $sStatus,
    ){}
    

    public function isAcknowledged(): bool
    {
        return $this->bAcknowledged;
    }

    public function getStatus(): string
    {
        return $this->sStatus;
    }

}
