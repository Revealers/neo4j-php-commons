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

interface RelationshipInterface extends PropertyBagInterface
{
    public function getId(): int;

    public function getType(): RelationshipType;

    public function getStartNode(): NodeInterface;

    public function getEndNode(): NodeInterface;

    /**
     * Returns the other node of the Relationship, based on the given <code>Node</code>
     * @throws InvalidArgumentException When the given node does not make part of the Relationship
     */
    public function getOtherNode(NodeInterface $node): NodeInterface;

    public function getDirection(NodeInterface $node);

    public function getNodes(): array;

    public function isType(RelationshipType $relationshipType): bool;
}
