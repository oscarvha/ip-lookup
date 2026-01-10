<?php

namespace Osd\IpLookup\Domain\Models;

use Osd\IpLookup\Domain\ValueObject\IpInfo;
use Osd\IpLookup\Domain\ValueObject\IpLookupId;
use Osd\IpLookup\Domain\ValueObject\IpNetworkOwner;

final readonly class IpLookup
{
    private function __construct(
        private IpLookupId $uuid,
        private string $ipAddress,
        private IpInfo $info,
        private IpNetworkOwner $owner,
        private ?\DateTimeImmutable $createdAt,
        private ?\DateTimeImmutable $updatedAt,
    )
    {}

    /**
     * @return IpLookupId
     */
    public function uuid(): IpLookupId
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function ip(): string
    {
        return $this->ipAddress;
    }

    /**
     * @return IpInfo
     */
    public function info(): IpInfo
    {
        return $this->info;
    }

    /**
     * @return IpNetworkOwner
     */
    public function owner(): IpNetworkOwner
    {
        return $this->owner;
    }

    public function createdAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param IpLookupId $id
     * @param string $ip
     * @param IpInfo $info
     * @param IpNetworkOwner $owner
     * @return self
     */
    public static function create(
        IpLookupId $id,
        string $ip,
        IpInfo $info,
        IpNetworkOwner $owner
    ): self {

        return new self(
            $id,
            $ip,
            $info,
            $owner,
            new \DateTimeImmutable(),
            new \DateTimeImmutable(),
        );
    }


    /**
     * @param IpLookupId $id
     * @param string $ip
     * @param IpInfo $info
     * @param IpNetworkOwner $owner
     * @param \DateTimeImmutable|null $createdAt
     * @return self
     */
    public static function recreate(
        IpLookupId $id,
        string $ip,
        IpInfo $info,
        IpNetworkOwner $owner,
        ?\DateTimeImmutable $createdAt
    ): self {

        return new self(
            $id,
            $ip,
            $info,
            $owner,
            $createdAt,
            new \DateTimeImmutable(),
        );
    }



}
