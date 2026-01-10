<?php

namespace Osd\IpLookup\Infrastructure;

use Osd\IpLookup\Domain\Contracts\UuidGenerator;
use Symfony\Component\Uid\Uuid;

final class SymfonyUuidGenerator implements UuidGenerator
{
    /**
     * @return string
     */
    public function generate(): string
    {
        return Uuid::v4()->toRfc4122();

    }
}
