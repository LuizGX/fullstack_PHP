<?php
    class User {
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function verifyLogin($email, $password){
            $sql = "SELECT * FROM users WHERE email= '{$email}'";
            $result = $this->conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            $password = base64_encode($password);

            if(!$row){
                echo '<script language="javascript">';
                echo 'alert("Usuário não cadastrado ou inválido!"); location.href="login.php";';
                echo '</script>';
            }else if($password == $row['password']){
                header('Location: ../../index.php');
            }else{
                echo '<script language="javascript">';
                echo 'alert("Senha Invalida"); location.href="login.php";';
                echo '</script>';
            }
            mysql_close($this->conn);
        }

        public function signUp($email, $password){
            $encryptedPassword = base64_encode($password);
            try{
                $sql = "INSERT INTO users (email, password) VALUES ('$email', '$encryptedPassword')";
                $result = $this->conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                header('Location: ../../index.php');
            } catch (Exception $err){
                echo 'erro ao cadastrar: ' . $err;
            }
            mysql_close($this->conn);
        }
    }