<?php

require_once "../Controller/Product.php";

use Controller\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private $product;

    protected function setUp(): void
    {
        $this->product = new Product('1', 'Banana', '2', '7', '4');
    }

    protected function tearDown(): void
    {
        $this->product = null;
    }

    public function setPriceDataProvider(): array
    {
        return array(
            array(2, 4),
            array(4, 7),
            array(16, 28),
            array(17, 30)
        );
    }

    /**
     * @dataProvider setPriceDataProvider
     */
    public function testSetPrice($number, $expected)
    {
        $result = $this->product->setPrice($number);
        $this->assertEquals($expected, $result);
    }

    public function testCreateItem()
    {
        $expected = "<div class='col'>
            <div>
                <img src='public/img/banana.png' alt='product'>
            </div>
            <div class='info'>
              <p class='title'> Banana </p>
                <p class='price'> Price: <span>2£/1 </span> </p>
              <p class='special'> special 
                <span> 7£ for 4 pc. </span> 
              </p>
              <form action='add/1' method='post'>
                  <span class='btn-count' id='minus'>-</span>
                  <input class='quantity' type='text' value='1' name='quantity' readonly>
                  <span class='btn-count' id='plus'>+</span>
                  <button type='submit' class='submit'> Add </button>
              </form>
            </div>
          </div>";
        $result = $this->product->createItem();
        $this->assertEquals($expected, $result);
    }
}