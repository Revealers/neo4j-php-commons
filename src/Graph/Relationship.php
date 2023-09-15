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

class Relationship extends PropertyBag implements RelationshipInterface
{
    protected int $id;

    protected RelationshipType $type;

    protected NodeInterface $startNode;

    protected NodeInterface $endNode;

    public function __construct(int $id, RelationshipType $relationshipType, NodeInterface $startNode, NodeInterface $endNode)
    {
        $this->id = $id;
        $this->type = $relationshipType;
        $this->startNode = $startNode;
        $this->endNode = $endNode;

        parent::__construct();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): RelationshipType
    {
        return $this->type;
    }

    public function getStartNode(): NodeInterface
    {
        return $this->startNode;
    }

    public function getEndNode(): NodeInterface
    {
        return $this->endNode;
    }

    public function getOtherNode(NodeInterface $node): NodeInterface
    {
        if ($node->getId() === $this->startNode->getId()) {
            return $this->endNode;
        } elseif ($node->getId() === $this->endNode->getId()) {
            return $this->startNode;
        }

        throw new InvalidArgumentException(sprintf(
            'The node with ID "%s" is not part of the relationship with ID "%s"',
            $node->getId(),
            $this->id
        ));
    }

    public function getDirection(NodeInterface $node): Direction
    {
        if ($node !== $this->startNode && $node !== $this->endNode) {
            throw new InvalidArgumentException('The given node is not part of the Relationship');
        }

        return $node === $this->startNode ? Direction::OUTGOING() : Direction::INCOMING();
    }

    public function getNodes(): array
    {
        return array($this->startNode, $this->endNode);
    }

    public function isType(RelationshipType $relationshipType): bool
    {
        return $relationshipType->getName() === $this->type->getName();
    }
}
