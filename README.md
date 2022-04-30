# PHP Value Object
A library to bootstrap the use of Domain Driven Design valueObjects

![CI](https://github.com/noahlvb/php-valueobject/workflows/CI/badge.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/noahlvb/valueobject/v/stable)](https://packagist.org/packages/noahlvb/valueobject)
[![License](https://poser.pugx.org/noahlvb/valueobject/license)](https://packagist.org/packages/noahlvb/valueobject)

Installation
---
With [composer](http://packagist.org), add:

```bash
$ composer require noahlvb/valueobject
```

Or if your using Symfony: [valueobject-bundle](https://github.com/noahlvb/php-valueobject-bundle)

```bash
$ composer require noahlvb/valueobject-bundle
```

Run Tests
---
To make sure everything works you can run tests:

```bash
$ make test
```

How to use
---
Currently there are two primitive types supported:
- String : ValueObjectString
- Integer : ValueObjectInteger

Creating a simple value object without checks.

```php
class Name extends ValueObjectString
{
    protected function sanitize(string $value): string
    {
        return trim($value);
    }

    public function isValid(string $value): bool
    {
        return true;
    }
}
```

If you want to validate a value during construction of a value object, simply override the isValid method with your check:
```php
class Name extends ValueObject
{
    protected function sanitize(string $value): string
    {
        return trim($value);
    }

    public function isValid(string $value): bool
    {
        return strlen($value) < 255;
    }
}
```

If you want a custom exception thrown during construction, override the getException method with your own exception:
```php
class Name extends ValueObject
{
    protected function sanitize(string $value): string
    {
        return trim($value);
    }

    public function isValid(string $value): bool
    {
        return strlen($value) < 255;
    }

    protected function getException(): Exception
    {
        return new NameToLongException();
    }
}
```

Examples
---
Example implementations can be found at `tests/Unit/ValueObject`. These are the same value objects used for testing:
- [EmailAddress](tests/Unit/ValueObject/EmailAddress.php)
- [Capacity](tests/Unit/ValueObject/Capacity.php)