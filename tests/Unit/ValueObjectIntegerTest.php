<?php

declare(strict_types=1);

namespace Noahlvb\ValueObject\Tests\Unit;

use Noahlvb\ValueObject\Tests\Unit\ValueObject\Capacity;
use PHPUnit\Framework\TestCase;

class ValueObjectIntegerTest extends TestCase
{
    private const CAPACITY_VALID = 95;
    private const CAPACITY_INVALID = 256;

    public function testCreateValid(): void
    {
        $capacity = new Capacity(self::CAPACITY_VALID);

        static::assertSame(self::CAPACITY_VALID, $capacity->getValue());
        static::assertSame((string) self::CAPACITY_VALID, (string) $capacity);
    }

    /**
     * @test
     */
    public function testCreateInvalid(): void
    {
        static::expectException('Noahlvb\ValueObject\Exception\ValueNotValidException');
        new Capacity(self::CAPACITY_INVALID);
    }
}
