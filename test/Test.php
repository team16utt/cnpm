<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use CodeIgniter\Test\FeatureTestTrait;

class Test extends FeatureTestCase
{
    use  FeatureTestTrait;
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function testHomeControl(): void
    {
        $result = $this->call('get', '/');
    }
}
