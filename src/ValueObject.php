<?php

declare(strict_types=1);

namespace Noahlvb\ValueObject;

use Exception;
use Noahlvb\ValueObject\Exception\ValueNotValidException;

abstract class ValueObject
{
    protected $value;

    public function __construct($value, bool $check = true)
    {
        $this->value = $this->sanitize($value);

        if ($check && !$this->isValid($this->value)) {
            throw $this->getException();
        }
    }

    abstract public function getValue();

    public function __toString(): string
    {
        return (string) $this->getValue();
    }

    public function equals(ValueObject $otherId): bool
    {
        if (!$otherId instanceof $this) {
            return false;
        }

        return $otherId->getValue() === $this->getValue();
    }

    protected function getException(): Exception
    {
        return new ValueNotValidException();
    }
}
