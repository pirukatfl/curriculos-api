<?php

namespace App\Services\Strategy;

use App\Services\Interfaces\JwtInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Signature\Algorithm\HS256;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\Signature\Serializer\CompactSerializer;


class JwtStrategy implements JwtInterface
{
    private string $personalToken;
    private string $payload;

    public function __construct()
    {

    }

    public function setAlgorithm(): array
    {
        $algorithm = new AlgorithmManager([
            new HS256()
        ]);

        return [
            'algorithm' => $algorithm,
        ];
    }
    public function setKey(): array
    {
        $key = JWKFactory::createFromSecret(
            Config::get('jwt.secret'),
            [
                'alg' => 'HS256',
                'use' => 'sig'
            ]
        );

        return [
            'key' => $key,
        ];
    }
    public function setPayload(): void
    {
        $this->payload = json_encode([
            'exp' => Config::get('sanctum.expiration'),
            'iss' => Auth::user(),
            'aud' => Config::get('app.name'),
            'access_token' => $this->personalToken
        ]);
    }

    public function createToken(string $personalToken): string
    {
        $algorithmManager = $this->setAlgorithm();
        $jwk = $this->setKey();

        $this->personalToken = $personalToken;
        $this->setPayload();

        $jws = (new JWSBuilder($algorithmManager['algorithm']))
            ->create()
            ->withPayload($this->payload)
            ->addSignature($jwk['key'], ['alg' => 'HS256'])
            ->build();

        return (new CompactSerializer())->serialize($jws, 0);
    }
}
