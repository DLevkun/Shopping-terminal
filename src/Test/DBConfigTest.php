<?php

require_once "../Controller/DBConfig.php";

use Controller\DBConfig;
use PHPUnit\Framework\TestCase;

class DBConfigTest extends TestCase
{
    private $dbconfig;

    protected function setUp(): void
    {
        $this->dbconfig = new DBConfig();
    }

    protected function tearDown(): void
    {
        $this->dbconfig = null;
    }

    public function createConnectionDataProvider(): array
    {
        return array(
            array("localhost:3307", "root", "123D-l456dl", "shopping"),
            array("localhost:3307", "root", "123D-l456dl", "berghotel")
        );
    }

    /**
     * @dataProvider createConnectionDataProvider
     */
    public function testCreateConnection($host, $user, $pass, $dbname)
    {
        $result = $this->dbconfig->createConnection($host, $user, $pass, $dbname);
        $this->assertInstanceOf(mysqli::class, $result);
    }
}