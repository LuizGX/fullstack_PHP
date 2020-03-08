<?php
    include_once 'config/Database.php';
    include_once 'model/colours.php';

    $db = new Database();
    $db->connect();

    $colour = new Colour($db);

    $result = $colour->read();
    $numRows = $result->num_rows;

    if($numRows > 0){
        $colours_arr = array();
        $colours_arr['data'] = array();

        while($row = mysqli_fetch_assoc($result)) {
            $colour_item = array(
                "id_colour"=> $row['id_colour'],
                "colour_name" => $row['colour_name']
            );
            array_push($colours_arr['data'], $colour_item);
        }
    } else {
        $colours_arr['data'] = array('message'=> 'Não foram encontradas cores');
    }