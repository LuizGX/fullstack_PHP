<?php
    include_once '../../config/Database.php';
    include_once '../../model/user.php';

    $db = new Database();
    $db->connect();

    $user = new User($db);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->signUp($email, $password);