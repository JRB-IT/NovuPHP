<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models;

use jrbit\novu;

final class MSubscriber extends \stdClass {

    public function __construct(
        private string $sInternalId,
        private ?string $sFirstName,
        private ?string $sLastName,
        private ?string $sEmail,
        private ?string $sPhone,
        private ?string $sAvatar,
        private string $sSubscriberId,
        private array $aChannels,
        private string $sOrganizationId,
        private string $sEnvironmentId,
    ){}

    public function getInternalId(): ?string
    {
        return $this->sInternalId;
    }

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

    public function getChannels(): array
    {
        return $this->aChannels;
    }

    public function getOrganizationId(): string
    {
        return $this->sOrganizationId;
    }

    public function getEnvironmentId(): string
    {
        return $this->sEnvironmentId;
    }
}
