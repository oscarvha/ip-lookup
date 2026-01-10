<?php

namespace Osd\IpLookup\Bootstrap;

use Osd\IpLookup\Infrastructure\IpGuideProvider;
use Osd\IpLookup\Infrastructure\SymfonyUuidGenerator;
use Osd\IpLookup\Application\GetIpLookup;

final class IpLookupFactory
{
    public static function createDefault(): GetIpLookup
    {
        return new GetIpLookup(
            new IpGuideProvider(),
            new SymfonyUuidGenerator()
        );
    }
}
