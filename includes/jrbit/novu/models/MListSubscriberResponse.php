<?php

/**
 * Copyright (c) 2022, Justin Back <j.back@jrbit.de>
 * All rights reserved.
 */

namespace jrbit\novu\models;
use jrbit\novu;

final class MListSubscriberResponse extends \stdClass {


    public function __construct(
        private int $iPage,
        private int $iTotalCount,
        private int $iPageSize,
        private array $mData
    ){}
    

    public function getPage(): int
    {
        return $this->iPage;
    }

    public function getTotalCount(): int
    {
        return $this->iTotalCount;
    }

    public function getPageSite(): int
    {
        return $this->iPageSize;
    }

    public function getData(): array
    {
        return $this->mData;
    }

}
