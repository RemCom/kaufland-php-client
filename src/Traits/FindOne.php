<?php

namespace RemCom\KauflandPhpClient\Traits;

use RemCom\KauflandPhpClient\connection;
use RemCom\KauflandPhpClient\Models\Model;

/**
 * Trait FindOne
 *
 * @method Connection connection()
 *
 * @package RemCom\KauflandPhpClient\Traits
 */
trait FindOne
{

    /**
     * @param $id
     * @return Model|FindOne
     */
    public function find($id)
    {
        $result = $this->connection()->get($this->url . '/' . urlencode($id));

        if (!array_key_exists($this->namespaces['singular'], $result)) {
            return null;
        }

        return new self($this->connection(), $result[$this->namespaces['singular']], true);
    }
}