<?php

namespace App\Services;

use App\Services\Interfaces\JwtInterface;
use Exception;

class JwtService
{
    private JwtInterface $instance;
    public function __construct(string $className)
    {
        $this->instance = $this->getInstance($className);
    }

    /**
     * @throws Exception
     */
    private function getInstance(string $className)
    {
        if (!class_exists($className)) {
            throw new Exception("Class {$className} does not exist");
        }

        return new $className();
    }

    public function createToken(string $personalToken): string
    {
        return $this->instance->createToken($personalToken);
    }
}
