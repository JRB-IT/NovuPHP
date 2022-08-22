<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\interfaces;

use jrbit\novu;

interface IEvents {

    public function __construct(string $sApiKey, string $sApiUrl);

    public function Trigger(novu\models\requests\mTriggerBody $mBody): novu\models\responses\mTriggerEventResponse;
    public function Broadcast(novu\models\requests\mBroadcastBody $mBody): novu\models\responses\mBroadcastEventResponse;
    public function Cancel(string $sTransactionId): bool;
}