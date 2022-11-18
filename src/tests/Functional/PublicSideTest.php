<?php

namespace Tests\Functional;

class PublicSideTest extends BaseTestCase {
    /**
     * @test
     *
     */
    public function getPublicView() {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }
}