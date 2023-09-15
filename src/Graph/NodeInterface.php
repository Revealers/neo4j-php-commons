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

interface NodeInterface extends PropertyBagInterface
{
    public function getLabels(): array;

    public function hasLabel(string $name): bool;

    public function getId(): int;

    public function getRelationships(): array;

    public function hasRelationships(): bool;

    public function addRelationship(RelationshipInterface $relationship);
}
