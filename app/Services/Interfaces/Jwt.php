<?php

namespace App\Services\Interfaces;

interface Jwt
{
    public function setAlgorithm(): array;

    public function setKey(): array;

    public function setPayload(): void;

    public function createToken(string $personalToken): string;
}
