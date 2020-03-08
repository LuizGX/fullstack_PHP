<?php
    include_once 'config/Database.php';
    include_once 'model/product.php';

    $db = new Database();
    $db->connect();

    $product = new Product($db);

    $result = $product->read();
    $numRows = $result->num_rows;

    if($numRows > 0){
        $products_arr = array();
        $products_arr['data'] = array();

        while($row = mysqli_fetch_assoc($result)) {
            $product_item = array(
                "product_name" => $row['product_name']
            );
            array_push($products_arr['data'], $product_item);
        }
    } else {
        $products_arr['data'] = array('message'=> 'Não foram encontrados produtos');
    }