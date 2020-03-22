<?php

declare(strict_types=1);

namespace Noahlvb\ValueObject;

abstract class ValueObjectString extends ValueObject
{
    /**
     * @var string
     */
    protected $value;

    public function __construct(string $value, bool $check = true)
    {
        parent::__construct($value, $check);
    }

    abstract public function isValid(string $value): bool;

    public function getValue(): string
    {
        return $this->value;
    }

    abstract protected function sanitize(string $value): string;
}
