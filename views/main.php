<?php
//Autoload the classes
spl_autoload_register(function ($className) {
    if (file_exists(dirname(__DIR__)."\src\\$className.php")) {
        require_once(dirname(__DIR__)."\src\\$className.php");
        if (!class_exists($className, false)) {
            exit("Class not found");
        }
    } else {
        exit("Module {$className} doesn't exist");
    }
});

$products = new \Controller\ProductList("select * from products", "shopping");
$productList = $products->getProductList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping terminal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
</head>
<body>
  <div class="container">
    <?php include "views/inc/header.php" ?>
    <div class="main">
        <?php

        //Create a row with two columns of products
        for ($i = 0; $i <= count($productList)/2; $i = $i + 2) {
            print "<div class='row align-items-center'>"
                       .$productList[$i]->createItem().
                        $productList[$i+1]->createItem().
                   "</div>";
        }
        ?>
    </div>
  </div>
  <script src="public/js/main.js"></script>
</body>
</html>