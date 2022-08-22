<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models\responses;

use jrbit\novu;

final class mHttpResponse extends \stdClass {

    public function __construct(
        private string $sBody,
        private int $iCode
    ){}

    public function getBody(): string
    {
        return $this->sBody;
    }

    public function getCode(): int
    {
        return $this->iCode;
    }

}
