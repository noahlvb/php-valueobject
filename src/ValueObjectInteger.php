<?php

declare(strict_types=1);

namespace Noahlvb\ValueObject;

abstract class ValueObjectInteger extends ValueObject
{
    /**
     * @var int
     */
    protected $value;

    public function __construct(int $value, bool $check = true)
    {
        parent::__construct($value, $check);
    }

    abstract public function isValid(int $value): bool;

    public function getValue(): int
    {
        return $this->value;
    }

    protected function sanitize(int $value): int
    {
        return $value;
    }
}
