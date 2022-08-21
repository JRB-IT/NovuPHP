<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\interfaces;

interface IEvents {

    public function __construct(string $sApiKey, string $sApiUrl);
}
