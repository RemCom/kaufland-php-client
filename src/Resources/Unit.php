<?php

namespace RemCom\KauflandPhpClient\Resources;

class Unit extends Model
{
    /**
     * @param string $id_offer
     * @param string $id_item
     * @param string $ean
     * @return mixed
     */
    public function list(string $id_offer = '', string $id_item = '', string $ean = '')
    {
        return $this->connection->request('GET', 'units/seller/', ['query' => $this->getQuery() + array_filter(['id_offer' => $id_offer, 'id_item' => $id_item, 'ean' => $ean])]);
    }

    /**
     * @param $identifier
     * @return array
     */
    public function show($identifier): array
    {
        return $this->connection->request('GET', "units/{$identifier}");
    }

    /**
     * @param $identifier
     * @param array $attributes
     * @return array
     */
    public function create($identifier, array $attributes): array
    {
        return $this->connection->request('POST', "units/{$identifier}", ['body' => $attributes]);
    }

    /**
     * @param $identifier
     * @param array $attributes
     * @return array
     */
    public function update($identifier, array $attributes): array
    {
        return $this->connection->request('PATCH', "units/{$identifier}", ['body' => $attributes]);
    }

    /**
     * @param $identifier
     * @return array
     */
    public function delete($identifier): array
    {
        return $this->connection->request('DELETE', "units/{$identifier}");
    }
}
