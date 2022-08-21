<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models;

use jrbit\novu;


final class MTriggerTo extends \stdClass {

    public function __construct(
        private ?string $sSubscriberId = null,
        private ?string $sFirstName = null,
        private ?string $sLastName = null,
        private ?string $sEmail = null,
        private ?string $sPhone = null,
        private ?string $sAvatar = null
        ){}

    public function getSubscriberId(): ?string
    {
        return $this->sSubscriberId;
    }

    public function getFirstname(): ?string
    {
        return $this->sFirstName;
    }

    public function getLastname(): ?string
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

    public function toArray(): array
    {
        return [
            "firstName" => $this->getFirstname(),
            "lastName" => $this->getLastname(),
            "email" => $this->getEmail(),
            "phone" => $this->getPhone(),
            "avatar" => $this->getAvatar(),
        ];
    }

}
