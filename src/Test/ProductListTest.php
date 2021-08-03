<?php

require_once "../Controller/ProductList.php";
require_once "../Controller/Product.php";

use Controller\ProductList;
use Controller\Product;
use PHPUnit\Framework\TestCase;

class ProductListTest extends TestCase
{
    public function sumListDataProvider(): array
    {
        return array(
            array(
                array(
                    array('id' => '2', 'title' => 'Peach', 'code' => 'YB', 'quantity' => '4', 'price' => '12'),
                    array('id' => '4', 'title' => 'Apple', 'code' => 'GD', 'quantity' => '10', 'price' => '1.5')
                ),
                'quantity',
                14
            )
        );
    }

    /**
     * @dataProvider sumListDataProvider
     */
    public function testSumList($array, $param, $expected)
    {
        $result = ProductList::sumList($array, $param);
        $this->assertEquals($expected, $result);
    }
}