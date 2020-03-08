<?php
    class Product {
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        // public function create($name, $colours) {
        //     $sql = "INSERT INTO products (product_name) VALUES ('$name')"
        //     $result = $this->conn->query($sql);
        //     $row = mysqli_fetch_assoc($result);

        // }

        public function read() {
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);
            // $row = mysqli_fetch_assoc($result);

            return $result;
        }

        public function update() {
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);
            $row = mysqli_fetch_assoc($result);

        }

        public function delete() {
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);
            $row = mysqli_fetch_assoc($result);

        }
    }