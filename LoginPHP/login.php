<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        require_once 'dbh.php';
        require_once 'login_model.php';
        require_once 'login_contr.php';
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}
else {
    header('Location: home.php');
    die();
}