<?php

declare(strict_types = 1);

namespace SmartWallet\AccessClient;

class AccessServiceClient implements AccessServiceClientInterface
{
    public function __construct(
        private string $accessServiceUrl,
    ) {
    }

    public function checkAccessToResourceType(string $userId, string $resourceType, string $accessType): bool
    {
        $urlString = "$this->accessServiceUrl/check-access-resource-type.php?" .
            http_build_query(
                [
                    'user_id' => $userId,
                    'resource_type' => $resourceType,
                    'access_type' => $accessType,
                ],
            );

        $serverOutput = file_get_contents($urlString);

        return $serverOutput === json_encode(true);
    }

    public function checkAccessToResource(string $userId, string $resourceType, string $accessType, string $resourceId): bool
    {
        $urlString = "$this->accessServiceUrl/check-access-resource.php?" .
            http_build_query(
                [
                    'user_id' => $userId,
                    'resource_type' => $resourceType,
                    'access_type' => $accessType,
                    'resource_id' => $resourceId,
                ],
            );

        $serverOutput = file_get_contents($urlString);

        return $serverOutput === json_encode(true);
    }
}