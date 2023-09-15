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

use InvalidArgumentException;

class Statement implements StatementInterface
{
    protected string $text;

    protected array $parameters;

    protected ?string $tag = null;

    protected StatementType $type;


    private function __construct(string $text, array $parameters, ?string $tag, StatementType $statementType)
    {
        $this->text = $text;
        $this->parameters = $parameters;
        $this->type = $statementType;

        if (null !== $tag) {
            $this->tag = $tag;
        }
    }

    public static function create(string $text, array $parameters = array(), string $tag = null, string $statementType = StatementType::READ_WRITE): Statement
    {
        if (!StatementType::isValid($statementType)) {
            throw new InvalidArgumentException(sprintf('Value %s is invalid as statement type, possible values are %s', $statementType, json_encode(StatementType::keys())));
        }
        $type = new StatementType($statementType);

        return new self($text, $parameters, $tag, $type);
    }

    public static function prepare(string $text, array $parameters = array(), string $tag = null): Statement
    {
        $type = new StatementType(StatementType::READ_WRITE);

        return new self($text, $parameters, $tag, $type);
    }

    public function text(): string
    {
        return $this->text;
    }

    public function parameters(): array
    {
        return $this->parameters;
    }

    public function withText(string $text): StatementInterface|Statement
    {
        return new self($text, $this->parameters, $this->tag, $this->type);
    }

    public function withParameters(array $parameters): StatementInterface|Statement
    {
        return new self($this->text, $parameters, $this->tag, $this->type);
    }

    public function withUpdatedParameters(array $parameters): StatementInterface|Statement
    {
        $parameters = array_merge($this->parameters, $parameters);

        return new self($this->text, $parameters, $this->tag, $this->type);
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function hasTag(): bool
    {
        return null !== $this->tag;
    }

    public function statementType(): StatementType
    {
        return $this->type;
    }
}
