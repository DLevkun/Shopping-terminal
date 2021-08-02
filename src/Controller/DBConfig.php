<?php

namespace Controller;

use mysqli;

/**
 * Class DBConfig
 * @package Controller
 * @access public
 */
class DBConfig
{
    private $server;
    private $user;
    private $password;
    private $name;

    /**
     * Creates connection with database
     * @param string $server
     * @param string $user
     * @param string $pass
     * @param string $dbname
     * @return mysqli
     * @access public
     */
    public function createConnection(string $server, string $user, string $pass, string $dbname): mysqli
    {
        $this->server = $server;
        $this->user = $user;
        $this->password = $pass;
        $this->name = $dbname;

        $connection = mysqli_connect($this->server, $this->user, $this->password, $this->name);

        if (!$connection) {
            die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }

        $res = mysqli_set_charset($connection, "utf8");

        return $connection;
    }

    /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}
