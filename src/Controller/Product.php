<?php


namespace Controller;

/**
 * Class Product
 * @package Controller
 */
class Product
{

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->product_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getSpecialPrice()
    {
        return $this->special_price;
    }

    /**
     * @return mixed
     */
    public function getSpecialQuantity()
    {
        return $this->special_quantity;
    }

    /**
     * @return string
     */
    public function getProductCode(): string
    {
        return $this->product_code;
    }



    private $product_id;
    private $title;
    private $price;
    private $special_price;
    private $special_quantity;
    private $product_code;
    private $calculatedPrice;

    public function __construct(string $id, string $title, string $price, string $product_code, $spec_price = null, $spec_quantity = null)
    {
        $this->product_id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->special_price = $spec_price;
        $this->special_quantity = $spec_quantity;
        $this->product_code = $product_code;
        $this->calculatedPrice = 0;
    }

    /**
     * Creates html template with information about particular product
     * @return string
     * @access public
     */
    public function createItem(): string
    {
        $low_string = strtolower($this->title);
        if ($this->special_price === null) {
            $special_class = "special hidden";
        } else {
            $special_class = "special";
        }
        return "<div class='col'>
            <div>
                <img src='public/img/$low_string.png' alt='product'>
            </div>
            <div class='info'>
              <p class='title'> {$this->title} </p>
                <p class='price'> Price: <span>{$this->price}£/1 </span> </p>
              <p class='$special_class'> special 
                <span> {$this->special_price}£ for {$this->special_quantity} pc. </span> 
              </p>
              <form action='add/{$this->product_id}' method='post'>
                  <span class='btn-count' id='minus'>-</span>
                  <input class='quantity' type='text' value='1' name='quantity' readonly>
                  <span class='btn-count' id='plus'>+</span>
                  <button type='submit' class='submit'> Add </button>
              </form>
            </div>
          </div>";
    }

    /**
     * Defines the price of chosen products depending on their quantity and price
     * @param $quantity
     * @return float|int
     * @access public
     */
    public function setPrice($quantity)
    {
        if ($this->special_price != null) {
            if ($quantity < $this->special_quantity) {
                $this->calculatedPrice = $quantity * $this->price;
                return $this->calculatedPrice;
            } else {
                $diff = $quantity - $this->special_quantity;
                if ($diff > $this->special_quantity) {
                    $this->setPrice($diff);
                    $this->calculatedPrice += $this->special_price;
                } elseif ($diff == $this->special_quantity) {
                    $this->calculatedPrice = $this->special_price * 2;
                } else {
                    $this->calculatedPrice = $this->special_price + $diff * $this->price;
                }
                return $this->calculatedPrice;
            }
        } else {
            return $quantity * $this->price;
        }
    }
}