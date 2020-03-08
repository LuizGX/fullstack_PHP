<?php
    include_once '../../config/Database.php';
    include_once '../../model/product.php';

    $db = new Database();
    $db->connect();

    $product = new Product($db);

    $id_product = $_GET['id'];
    $result = $product->show_by_id($id_product);

    header('Location: ../../createProduct.php?id=' . $id_product);