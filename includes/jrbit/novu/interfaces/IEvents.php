<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\interfaces;

use jrbit\novu;

interface IEvents {

    public function __construct(string $sApiKey, string $sApiUrl);

    public function Trigger(novu\models\MTriggerBody $mBody): novu\models\MTriggerEventResponse;
    public function Broadcast(novu\models\MBroadcastBody $mBody): novu\models\MBroadcastEventResponse;
    public function Cancel(string $sTransactionId): bool;
}