<?php
//Autoload the classes
spl_autoload_register(function ($className) {
    if (file_exists(dirname(__DIR__)."\\$className.php")) {
        require_once(dirname(__DIR__)."\\$className.php");
        if (!class_exists($className, false)) {
            exit("Class not found");
        }
    } else {
        exit("Module {$className} doesn't exist");
    }
});

$id = $_SESSION['id'];
$quantity = $_SESSION['quantity'];

$products = new Controller\ProductList("select * from products where product_id = {$id}", "shopping");
$product = $products->getProductList()[0];

$product_code = $product->getProductCode();

//In $_SESSION create an array with information about particular product if it doesn't exist
if (!isset($_SESSION[$product_code])) {
    $_SESSION[$product_code] = [];
    $_SESSION[$product_code]['product'] = $product;
    $_SESSION[$product_code]['quantity'] = 0;
}

$_SESSION[$product_code]['quantity'] += $quantity;

//Delete unnecessary variables
unset($_SESSION['id']);
unset($_SESSION['quantity']);

//Return to main page
header('Location: ../main');
