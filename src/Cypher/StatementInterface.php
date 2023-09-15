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

interface StatementInterface
{
    public function text(): string;

    public function parameters(): array;

    public function getTag(): ?string;

    public function hasTag(): bool;

    public function statementType(): StatementType;

    public function withText(string $text): StatementInterface;

    public function withParameters(array $parameters): StatementInterface;

    public function withUpdatedParameters(array $parameters): StatementInterface;
}
