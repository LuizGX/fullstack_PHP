<?php
    class Database {
        private $host = 'localhost';
        private $db_name = 'easyjur';
        private $username = 'root';
        private $password = '';

        private $conn;

        public function connect() {
            $this->conn = null;

            $this->conn=mysqli_connect("$this->host","$this->username","$this->password","$this->db_name");

            if(mysqli_connect_error()){
                echo "Failed to connect to MySQL: ".mysqli_connect_error();
            }
            return $this->conn;
        }

        public function query($sql){
            return $this->conn->query($sql);
        }


    }