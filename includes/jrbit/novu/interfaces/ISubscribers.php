<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\interfaces;

use jrbit\novu;

interface ISubscribers {

    public function __construct(string $sApiKey, string $sApiUrl);

    public function List(int $iPage = 0): novu\models\responses\mListSubscriberResponse;
}