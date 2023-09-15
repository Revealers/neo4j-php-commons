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
 * Node representation class.
 */
class Node extends PropertyBag implements NodeInterface
{
    protected int $id;

    protected array $labels = [];

    protected array $relationships = [];

    public function __construct(int $id, array $labels = array(), array $relationships = array())
    {
        $this->id = $id;

        foreach ($labels as $label) {
            $this->labels[] = new Label($label);
        }

        foreach ($relationships as $relationship) {
            if (!$relationship instanceof RelationshipInterface) {
                throw new InvalidArgumentException(sprintf('Relationship must implement RelationshipInterface, "%s" given', json_encode($relationship)));
            }

            $this->relationships[] = $relationship;
        }

        parent::__construct();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function hasLabel(string $name): bool
    {
        return in_array($name, $this->labels);
    }

    public function getRelationships(): array
    {
        return $this->relationships;
    }

    public function hasRelationships(): bool
    {
        return !empty($this->relationships);
    }

    public function addRelationship(RelationshipInterface $relationship): void
    {
        $this->relationships[] = $relationship;
    }
}
