<?php

declare(strict_types=1);

namespace Noahlvb\ValueObject\Tests\Unit;

use Noahlvb\ValueObject\Tests\Unit\ValueObject\Capacity;
use Noahlvb\ValueObject\Tests\Unit\ValueObject\EmailAddress;
use PharIo\Manifest\Email;
use PHPUnit\Framework\TestCase;

class ValueObjectStringTest extends TestCase
{
    private const EMAIL_ADDRESS_VALID = 'mail@noahlvb.nl';
    private const EMAIL_ADDRESS_DIRTY_BEFORE = 'Noahlvb@gMail.com ';
    private const EMAIL_ADDRESS_DIRTY_SANITIZED = 'noahlvb@gmail.com';
    private const EMAIL_ADDRESS_INVALID = 'Henk@iets@nog.123';
    private const CAPACITY_VALID = 95;

    /**
     * @test
     */
    public function testCreateValid(): void
    {
        $emailAddress = new EmailAddress(self::EMAIL_ADDRESS_VALID);

        static::assertSame(self::EMAIL_ADDRESS_VALID, $emailAddress->getValue());
    }

    /**
     * @test
     */
    public function testCreateSanitize(): void
    {
        $emailAddress = new EmailAddress(self::EMAIL_ADDRESS_DIRTY_BEFORE);

        static::assertSame(self::EMAIL_ADDRESS_DIRTY_SANITIZED, $emailAddress->getValue());
    }

    /**
     * @test
     */
    public function testCreateInvalid(): void
    {
        static::expectException('Noahlvb\ValueObject\Exception\ValueNotValidException');
        new EmailAddress(self::EMAIL_ADDRESS_INVALID);
    }

    /**
     * @test
     */
    public function testEqualsSameType(): void
    {
        $emailAddressOne = new EmailAddress(self::EMAIL_ADDRESS_VALID);
        $emailAddressTwo = new EmailAddress(self::EMAIL_ADDRESS_DIRTY_BEFORE);

        static::assertFalse($emailAddressOne->equals($emailAddressTwo));
    }

    public function testEqualsDifferentType(): void
    {
        $emailAddress = new EmailAddress(self::EMAIL_ADDRESS_VALID);
        $capacity = new Capacity(self::CAPACITY_VALID);

        self::assertFalse($emailAddress->equals($capacity));
    }
}
