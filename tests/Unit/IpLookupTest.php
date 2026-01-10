<?php

use Osd\IpLookup\Application\GetIpLookup;
use Osd\IpLookup\Domain\Models\IpLookup;
use Osd\IpLookup\Domain\Contracts\IpProvider;
use Osd\IpLookup\Domain\Contracts\UuidGenerator;

it('creates an ip lookup from provider data', function () {

    $provider = Mockery::mock(IpProvider::class);
    $provider->shouldReceive('fetch')
        ->once()
        ->with('79.150.204.251')
        ->andReturn([
            'ip' => '79.150.204.251',
            'location' => [
                'city' => 'Alicante',
                'country' => 'ES',
                'timezone' => 'Europe/Madrid',
                'latitude' => 38.3,
                'longitude' => -0.4,
            ],
            'network' => [
                'cidr' => '79.150.0.0/16',
                'hosts' => [
                    'start' => '79.150.0.1',
                    'end' => '79.150.255.254',
                ],
                'autonomous_system' => [
                    'asn' => 3352,
                    'name' => 'Telefonica',
                    'organization' => 'TELEFONICA DE ESPANA',
                    'country' => 'ES',
                    'rir' => 'RIPE NCC',
                ],
            ],
        ]);

    $uuidGenerator = Mockery::mock(UuidGenerator::class);
    $uuidGenerator->shouldReceive('generate')
        ->once()
        ->andReturn('123e4567-e89b-12d3-a456-426614174000');

    $useCase = new GetIpLookup(
        $provider,
        $uuidGenerator
    );

    $result = $useCase->execute('79.150.204.251');

    expect($result)->toBeInstanceOf(IpLookup::class)
        ->and($result->ip())->toBe('79.150.204.251')
        ->and($result->owner()->asn())->toBe(3352)
        ->and($result->owner()->country())->toBe('ES')
        ->and($result->info()->geoLocation()->city())->toBe('Alicante')
        ->and($result->owner()->range()->cidr())->toBe('79.150.0.0/16');
});
