<?php

declare(strict_types=1);

namespace Tavp\Blocks\Tests;

use Tavp\Blocks\BlockRegistry;
use PHPUnit\Framework\TestCase;

class BlockRegistryTest extends TestCase
{
    public function testShipsMoreThanFortyBlocks(): void
    {
        $registry = new BlockRegistry();
        $this->assertGreaterThanOrEqual(40, $registry->count());
        $this->assertContains('Button', $registry->builtIn());
        $this->assertContains('SearchBar', $registry->builtIn());
    }

    public function testModuleCanRegisterBlock(): void
    {
        $registry = new BlockRegistry();
        $registry->register('CustomWidget');
        $this->assertTrue($registry->has('CustomWidget'));
        $this->assertGreaterThan(40, $registry->count());
    }

    public function testUnknownBlockNotPresent(): void
    {
        $registry = new BlockRegistry();
        $this->assertFalse($registry->has('DoesNotExist'));
    }
}
