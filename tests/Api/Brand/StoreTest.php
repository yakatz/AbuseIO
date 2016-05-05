<?php

namespace tests\Api\Brand;

use AbuseIO\Models\Brand;
use AbuseIO\Models\User;
use tests\TestCase;

class StoreTest extends TestCase
{
    const URL = '/api/v1/brands';

    public function testValidationErrors()
    {
        $user = User::find(1);
        $this->actingAs($user);

        $server = $this->transformHeadersToServerVars(["Accept" => 'application/json']);

        $response = $this->call('POST', self::URL, [], [], [], $server);

        $this->assertContains(
            'The name field is required.',
            $response->getContent()
        );
    }
}
