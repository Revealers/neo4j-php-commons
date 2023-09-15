<?php

namespace GraphAware\Common\Driver;

use GraphAware\Common\Result\ResultCollection;

interface PipelineInterface
{
    public function push(string $query, array $parameters = array(), $tag = null);

    public function run(): ResultCollection;
}
