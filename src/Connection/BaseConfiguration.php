<?php

namespace GraphAware\Common\Connection;

/**
 * A shared configuration class between connection. The configuration class is immutable.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class BaseConfiguration
{
    private array $data;

    protected function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public static function create(): static
    {
        return new static();
    }

    public function getValue(string $name, mixed $default = null): mixed
    {
        if (!isset($this->data[$name])) {
            return $default;
        }

        return $this->data[$name];
    }

    public function hasValue(string $name): bool
    {
        return isset($this->data[$name]);
    }

    public function setValue(string $name, mixed $value): BaseConfiguration|static
    {
        $new = clone $this;
        $new->data[$name] = $value;

        return $new;
    }
}
