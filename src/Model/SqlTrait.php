<?php

namespace Bchubbweb\Represent\Model;

trait SqlTrait
{

    protected string $sqlStatement;

    /**
     * Get the current SQL statement for the model
     *
     * @return string
     */
    public function toSql(): string
    {
        return $this->sqlStatement;
    }

    /**
     * Set the initial SQL statement for the model
     *
     * @param string $name
     * @param array $attributes
     * @return string
     */
    public function initialSqlStatement(string $name, array $attributes = []): string
    {
        return "INSERT INTO {$name}_table (" . implode(',', array_keys($attributes)) . ") VALUES (" . implode(',', array_values($attributes)) . ")";
    }

}
