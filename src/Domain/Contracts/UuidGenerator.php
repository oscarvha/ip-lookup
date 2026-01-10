<?php

namespace Osd\IpLookup\Domain\Contracts;

interface UuidGenerator
{
    public function generate(): string;

}
