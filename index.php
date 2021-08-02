<?php
include_once "src/Controller/Product.php";
session_start();

//Routing

if (!isset($_GET['route']) || $_GET['route'] === "" || $_GET['route'] === 'main') {
    require_once "views/main.php";
} elseif ($_GET['route'] === 'cart') {
    require_once "views/cart.php";
} elseif ($_GET['route'] === 'add') {
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['quantity'] = $_POST['quantity'];
    require_once 'src/Controller/add_to_cart.php';
} elseif ($_GET['route'] === 'delete') {
    $code = $_GET['id'];
    unset($_SESSION[$code]);
    header('Location: ../cart');
}
