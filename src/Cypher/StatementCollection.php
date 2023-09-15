<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Cypher;

class StatementCollection implements StatementCollectionInterface
{
    protected array $statements = [];

    protected ?string $tag;

    public function __construct(string $tag = null)
    {
        $this->tag = null !== $tag ? $tag : null;
    }

    public function getStatements(): array
    {
        return $this->statements;
    }

    public function add(StatementInterface $statement): void
    {
        $this->statements[] = $statement;
    }

    public function isEmpty(): bool
    {
        return empty($this->statements);
    }

    public function getCount(): int
    {
        return count($this->statements);
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function hasTag(): bool
    {
        return null !== $this->tag;
    }
}
