<?php

declare(strict_types=1);

namespace Noahlvb\ValueObject\Tests\Unit\ValueObject;

use Noahlvb\ValueObject\ValueObjectInteger;

class Capacity extends ValueObjectInteger
{
    public function isValid(int $value): bool
    {
        return $value <= 255;
    }
}
