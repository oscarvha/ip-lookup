<?php

use Osd\IpLookup\Domain\ValueObject\IpInfoGeoLocation;

it('creates a valid geo location', function () {
    $geo = new IpInfoGeoLocation(
        'Alicante',
        'ES',
        'Europe/Madrid',
        38.3712,
        -0.4935
    );

    expect($geo)->toBeInstanceOf(IpInfoGeoLocation::class);
});
