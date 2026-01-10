<?php

namespace Osd\IpLookup\Application;

use Osd\IpLookup\Domain\Contracts\IpProvider;
use Osd\IpLookup\Domain\Contracts\UuidGenerator;
use Osd\IpLookup\Domain\Models\IpLookup;
use Osd\IpLookup\Domain\ValueObject\IpInfo;
use Osd\IpLookup\Domain\ValueObject\IpLookupId;
use Osd\IpLookup\Domain\ValueObject\IpNetworkOwner;
use Osd\IpLookup\Domain\ValueObject\IpNetworkOwnerRange;

final class GetIpLookup
{
    public function __construct(
        private IpProvider         $provider,
        private UuidGenerator      $idGenerator,
    ) {}

    /**
     * @param string $ip
     * @return IpLookup
     */
    public function execute(string $ip): IpLookup
    {
        $data = $this->provider->fetch($ip);

        $info = IpInfo::fromArray($data);
        $ownerData = $data['network']['autonomous_system'];
        $network = $data['network'];
        $range = new IpNetworkOwnerRange($network['cidr'], $network['hosts']['start'], $network['hosts']['end']);
        $owner = new IpNetworkOwner(
            $ownerData['asn'],
            $ownerData['name'],
            $ownerData['organization'],
            $ownerData['country'],
            $ownerData['rir'],
            $range
        );

        return IpLookup::create(
            IpLookupId::fromString(
                $this->idGenerator->generate()
            ),
            $ip,
            $info,
            $owner
        );
    }
}
