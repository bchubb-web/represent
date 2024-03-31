<?php

namespace Bchubbweb\Represent;
 
use Bchubbweb\Represent\Model\ModelTrait;

class Model
{
    use ModelTrait;

    /**
     * Model constructor.
     *
     * @param string $name name of the model type
     * @param array $attributes
     */
    public function __construct(string $name, array $attributes = [])
    {
        $this->sqlStatement = $this->initialSqlStatement($name, $attributes);
    }
}
