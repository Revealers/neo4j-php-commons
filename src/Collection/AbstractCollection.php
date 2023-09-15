<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Collection;

abstract class AbstractCollection implements CollectionInterface
{
    protected array $elements = [];

    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    public function setElements(array $elements): void
    {
        $this->elements = $elements;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

}