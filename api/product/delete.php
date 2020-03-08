<?php
    include_once '../../config/Database.php';
    include_once '../../model/product.php';

    $db = new Database();
    $db->connect();

    $product = new Product($db);

    $id_product = $_GET['id'];
    $result = $product->delete($id_product);

    header('Location: ../../index.php');