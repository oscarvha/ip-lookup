<?php

use Osd\IpLookup\Domain\ValueObject\IpNetworkOwnerRange;

it('creates a valid network owner range', function () {
    $range = new IpNetworkOwnerRange(
        '79.150.0.0/16',
        '79.150.0.1',
        '79.150.255.254'
    );

    expect($range)->toBeInstanceOf(IpNetworkOwnerRange::class);
});
