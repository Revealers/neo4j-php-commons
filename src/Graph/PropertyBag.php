<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Graph;

use InvalidArgumentException;

/**
 * PropertyBag is a Common API for handling both Nodes and Relationships properties.
 * It acts as a container for key/value pairs.
 */
class PropertyBag implements PropertyBagInterface
{
    protected array $properties;

    public function __construct(array $properties = array())
    {
        $this->properties = $properties;
    }

    public function getProperty(string $key): mixed
    {
        if (!array_key_exists($key, $this->properties)) {
            throw new InvalidArgumentException(sprintf('No property with key "%s" found', $key));
        }

        return $this->properties[$key];
    }

    public function hasProperty(string $key): bool
    {
        return array_key_exists($key, $this->properties);
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperty(string $key, mixed $value): void
    {
        $this->properties[$key] = $value;
    }
}
