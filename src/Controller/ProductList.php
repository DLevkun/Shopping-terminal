<?php


namespace Controller;

/**
 * Class ProductList
 * @package Controller
 */
class ProductList
{
    private $productList;

    /**
     * @return array
     */
    public function getProductList(): array
    {
        return $this->productList;
    }

    public function __construct($query, $database)
    {
        $this->productList = array();
        $db = new DBConfig();
        $connection = $db->createConnection("localhost:3307", "root", "123D-l456dl", $database);

        $querySetter = new QueryPerformer();
        $allRecords = $querySetter->setQuery($query, $connection);

        while ($row = mysqli_fetch_array($allRecords)) {
            $this->productList[] = new Product($row['product_id'], $row['title'], $row['price'], $row['product_code'], $row['special_price'], $row['special_quantity']);
        }
    }

    /**
     * Function that transforms a complicated structure with objects into simple two-dimensional array
     * @param $array
     * @return array
     * @access public
     */
    public static function unpackList($array): array
    {
        return array_map(function ($arr) {
            $product = [];
            $product['id'] = $arr['product']->getProductId();
            $product['title'] = $arr['product']->getTitle();
            $product['code'] = $arr['product']->getProductCode();
            $product['quantity'] = $arr['quantity'];
            $product['price'] = $arr['product']->setPrice($arr['quantity']);
            return $product;
        }, $array);
    }

    /**
     * Calculates the sum of elements in two-dimensional array by specific key
     * @param $array
     * @param $param
     * @return int|mixed
     */
    public static function sumList($array, $param)
    {
        $sum = array_reduce($array, function ($carry, $item) use ($param) {
            return $carry + $item[$param];
        });

        return $sum ?? 0;
    }
}
