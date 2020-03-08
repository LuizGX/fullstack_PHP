<?php
    include_once '../../config/Database.php';
    include_once '../../model/product.php';

    $db = new Database();
    $db->connect();

    $product = new Product($db);

    $product_name = $_POST['product_name'];
    $product_colours = $_POST['product_colours'];

    $product->create($product_name, $product_colours);

    header('Location: ../../index.php');