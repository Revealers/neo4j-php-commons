<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Connection;

use GraphAware\Common\Driver\DriverInterface;

interface ConnectionInterface
{
    public function __construct(DriverInterface $driver, string $user = null, string $password = null);

    public function getDriver(): DriverInterface;

    public function getUser(): ?string;

    public function getPassword(): ?string;
}
