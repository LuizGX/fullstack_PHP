<?php
    include '../../config/Database.php';
    include '../../model/user.php';

    $db = new Database();
    $db->connect();
    
    $user = new User($db);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->verifyLogin($email, $password);