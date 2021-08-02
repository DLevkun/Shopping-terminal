<?php

require_once "../Controller/QueryPerformer.php";

use Controller\QueryPerformer;
use PHPUnit\Framework\TestCase;

class QueryPerformerTest extends TestCase
{
    private $queryPerformer;

    protected function setUp(): void
    {
        $this->queryPerformer = new QueryPerformer();
    }

    protected function tearDown(): void
    {
        $this->queryPerformer = null;
    }

    public function setQueryDataProvider(): array
    {
        return array(
            array("select * from products", new mysqli("localhost:3307", "root", "123D-l456dl", "shopping"))
        );
    }

    /**
     * @dataProvider setQueryDataProvider
     */
    public function testSetQuery($query, $connection)
    {
        $result = $this->queryPerformer->setQuery($query, $connection);
        $this->assertInstanceOf(mysqli_result::class, $result);
    }
}