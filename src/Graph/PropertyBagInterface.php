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

interface PropertyBagInterface
{
    /**
     * Returns a property value for the given <code>$key</code>. Throws an exception if not found.
     * @throws InvalidArgumentException when the object has no property with the given <code>$key</code>
     */
    public function getProperty(string $key): mixed;

    public function hasProperty(string $key): bool;

    public function getProperties(): array;

    public function setProperty(string $key, mixed $value);
}
