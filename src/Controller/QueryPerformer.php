<?php

namespace Controller;

use mysqli;
use mysqli_result;

/**
 * Class QueryPerformer
 * @package Controller
 */
class QueryPerformer
{
    private $query;

    /**
     * Returns the result of implementing SQL query
     * @param string $query
     * @param mysqli $connection
     * @return mysqli_result
     */
    public function setQuery(string $query, mysqli $connection): mysqli_result
    {
        $this->query = $query;

        return mysqli_query($connection, $query);
    }
}
