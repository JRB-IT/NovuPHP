<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models;

use jrbit\novu;

final class mDetailedSubscriber extends \stdClass {

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
        private bool $bDeleted,
        private string $sCreatedAt,
        private string $sUpdatedAt,
        private int $iV,
        private string $sApiKey,
        private string $sApiUrl
    ){}

    public function save(): bool
    {
        
    }

    public function delete(): bool
    {
        $Subscribers = new novu\api\Subscribers($this->sApiKey, $this->sApiUrl);
        if($Subscribers->Delete($this->sSubscriberId)){
            $this->bDeleted;
            return true;
        }
        return false;
    }


    public function getV(): int
    {
        return $this->iV;
    }

    public function getCreatedAt(): string
    {
        return $this->sCreatedAt;
    }

    public function getUpdatedt(): string
    {
        return $this->sUpdatedAt;
    }

    public function isDeleted(): bool
    {
        return $this->bDeleted;
    }

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

    public function setFirstName(string $value): this
    {
        $this->sFirstName = $value;
        return $this;
    }

    public function setLastName(string $value): this
    {
        $this->sLastName = $value;
        return $this;
    }

    public function setEmail(string $value): this
    {
        $this->sEmail = $value;
        return $this;
    }

    public function setPhone(string $value): this
    {
        $this->sPhone = $value;
        return $this;
    }
}
