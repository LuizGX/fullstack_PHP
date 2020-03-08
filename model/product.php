<?php
    class Product {
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($name, $colours) {
            $sql = "INSERT INTO products (product_name) VALUES ('$name')";
            $result = $this->conn->query($sql);
            $last_id = $this->conn->insert_id();

            for($i = 0; $i < count($colours); $i++){
                $sql2 = "INSERT INTO products_colours (id_product, id_colour) VALUES ('$last_id', $colours[$i])";
                $result2 = $this->conn->query($sql2);
            }
            
        }

        public function read() {
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);

            return $result;
        }

        public function read_colours_names($id_product) {
            $sql = "SELECT * FROM products_colours WHERE id_product = '{$id_product}'";
            $result = $this->conn->query($sql);
            $colours_names = array();

            while($row = mysqli_fetch_assoc($result)) {
                $sql2 = "SELECT colour_name FROM colours WHERE id_colour = '{$row['id_colour']}'";
                $result2 = $this->conn->query($sql2);
                
                while($row = mysqli_fetch_assoc($result2)) {
                    array_push($colours_names, $row['colour_name']);
                }
            }
            

            return $colours_names;
        }

        // public function update() {
        //     $sql = "SELECT * FROM products";
        //     $result = $this->conn->query($sql);
        //     $row = mysqli_fetch_assoc($result);

        // }

        // public function delete() {
        //     $sql = "SELECT * FROM products";
        //     $result = $this->conn->query($sql);
        //     $row = mysqli_fetch_assoc($result);

        // }
    }