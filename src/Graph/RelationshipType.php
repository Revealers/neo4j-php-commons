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

class RelationshipType
{
    protected string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function withName(string $name): RelationshipType
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
