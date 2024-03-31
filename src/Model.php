<?php

namespace Bchubbweb\Represent;
 
use Bchubbweb\Represent\Model\SqlTrait;

class Model
{
    use SqlTrait;
        
    protected array $modelAttributes = [];

    protected array $modelStructure;
    
    public string $modelName;

    /**
     * Model constructor.
     *
     * @param string $name name of the model type
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        // get the model name from the class extending this
        if (preg_match('/[^\\\\]*$/', static::class, $matches)) {
            $this->modelName = $matches[0];
        }

        // ensure the given attributes match the structure defined
        if (!$this->matchesStructure($attributes)) {
            throw new \InvalidArgumentException('Model attributes do not match the structure');
        }

        $this->modelAttributes = $attributes;
        $this->sqlStatement = $this->initialSqlStatement($this->modelName, $attributes);
    }

    /**
     * Check if the attributes match the structure
     *
     * @param array $attributes
     * @return bool
     */
    protected function matchesStructure(array $attributes): bool
    {
        return empty(array_filter($this->modelStructure, function ($value) use ($attributes) {
            return !array_key_exists($value, $attributes);
        }));
    }

    /**
     * get a model attribute
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name): mixed
    {
        return $this->modelAttributes[$name];
    }
}
