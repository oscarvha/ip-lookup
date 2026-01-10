<?php

namespace Osd\IpLookup\Domain\Contracts;

interface IpProvider
{
    public function fetch(string $ip): array;

}
