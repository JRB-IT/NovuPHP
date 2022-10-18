<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\interfaces;

use jrbit\novu;

interface IMessages {

    public function __construct(string $sApiKey, string $sApiUrl);

    public function Delete(string $sMessageId): bool;
}