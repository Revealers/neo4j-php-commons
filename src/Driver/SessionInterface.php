<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Driver;

use GraphAware\Common\Result\Result;
use GraphAware\Common\Transaction\TransactionInterface;

interface SessionInterface
{
    public function run(string $statement, array $parameters = [], string $tag = null): Result;

    public function close();

    public function transaction(): TransactionInterface;

    public function createPipeline(string $query = null, array $parameters = array(), string $tag = null): PipelineInterface;
}
