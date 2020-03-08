<?php
    class Colour {
        private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read() {
            $sql = "SELECT * FROM colours";
            $result = $this->conn->query($sql);
            // $row = mysqli_fetch_assoc($result);

            return $result;
        }
    }