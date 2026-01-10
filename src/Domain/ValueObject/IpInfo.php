<?php

namespace Osd\IpLookup\Domain\ValueObject;


use Osd\IpLookup\Domain\ValueObject\IpInfoGeoLocation;

final class IpInfo
{
    public function __construct(private readonly string $ipAddress,
                                 private readonly IpInfoGeoLocation $geoLocation)
    {
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data) : self
    {
        return new self(
            $data['ip'],
            IpInfoGeoLocation::fromArray($data['location'])
        );
    }

    public function geoLocation(): IpInfoGeoLocation
    {
        return $this->geoLocation;
    }
}
