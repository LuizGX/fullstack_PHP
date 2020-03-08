<?php
    include_once '../../config/Database.php';
    include_once '../../model/product.php';

    $db = new Database();
    $db->connect();

    $product = new Product($db);

    $id_product = $_GET['id'];
    $product_name = $_POST['product_name'];
    $product_colours = $_POST['product_colours'];
    
    $result = $product->update($id_product, $product_name, $product_colours);

    header('Location: ../../index.php');