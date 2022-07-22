<?php

declare(strict_types = 1);

namespace SmartWallet\AccessClient;

interface AccessServiceClientInterface
{
    public function checkAccessToResourceType(string $userId, string $resourceType, string $accessType): bool;

    public function checkAccessToResource(string $userId, string $resourceType, string $accessType, string $resourceId): bool;
}