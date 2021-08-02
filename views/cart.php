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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="public/css/cart.css">
</head>
<body>
  <div class="container">
    <?php include "views/inc/header.php" ?>
    
      <div class="back">
          <a href="main"> <p> Back to product list <img src="public/img/list.png" alt="list-icon"></p> </a>
      </div>


    <?php

    if (empty($_SESSION)) {
        print "<div class='empty'>
          <h1>The cart is empty</h1>
      </div>";
    } else {
        $total = 0;

        //
        $session_keys = array_keys($_SESSION);
        foreach ($session_keys as $key) {
            $low_string = strtolower($_SESSION[$key]['product']->getTitle());
            $quantity = $_SESSION[$key]['quantity'];
            $calculatedPrice = $_SESSION[$key]['product']->setPrice($quantity);
            print "<div class='product'>
                   <div class='img'>
                       <img src='public/img/{$low_string}.png' alt='product'>
                   </div>
                   <div class='description'>
                       <h2 class='title'>{$_SESSION[$key]['product']->getTitle()} - {$quantity} pc.</h2>
                       <p class='price'>{$calculatedPrice}£</p>
                   </div>
                    <div class='delete'>
                        <a href='delete/{$key}'> <img src='public/img/delete.png' alt='delete'> </a>
                    </div>
               </div>";
            $total = $total + $calculatedPrice;
        }
    }
    ?>

    <div class="total">
      <h1>TOTAL: <span> <?php print isset($total) ? $total : 0 ?> </span> </h1>
    </div>

    <div class="btn-pay">
      <button> Pay </button>
    </div>
  </div>
</body>
</html>