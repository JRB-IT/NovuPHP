<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models\requests;

use jrbit\novu;

final class mSubscriber extends \stdClass {

    public function __construct(
        private string $sSubscriberId,
        private ?string $sFirstName = null,
        private ?string $sLastName = null,
        private ?string $sEmail = null,
        private ?string $sPhone = null,
        private ?string $sAvatar = null
    ){}

    public function getFirstName(): ?string
    {
        return $this->sFirstName;
    }

    public function getLastName(): ?string
    {
        return $this->sLastName;
    }

    public function getEmail(): ?string
    {
        return $this->sEmail;
    }

    public function getPhone(): ?string
    {
        return $this->sPhone;
    }

    public function getAvatar(): ?string
    {
        return $this->sAvatar;
    }

    public function getSubscriberId(): string
    {
        return $this->sSubscriberId;
    }
}
