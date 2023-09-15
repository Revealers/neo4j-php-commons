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

use MyCLabs\Enum\Enum;

class Direction extends Enum
{
    const INCOMING = 'INCOMING';

    const OUTGOING = 'OUTGOING';

    const BOTH = 'BOTH';

    public static function INCOMING(): Direction
    {
        return new self(self::INCOMING);
    }

    public static function OUTGOING(): Direction
    {
        return new self(self::OUTGOING);
    }

    public static function BOTH(): Direction
    {
        return new self(self::BOTH);
    }
}
