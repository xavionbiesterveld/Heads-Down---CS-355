<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        require_once '../dbh.php';
        require_once 'signup_model.php';
        require_once 'signup_contr.php';


        $errors = [];

        if (is_input_empty($firstname, $lastname, $username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username is taken!";
        }

        require_once 'config_session.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;
            header("Location: ../home.php");
            die();
        }

        create_user($pdo, $firstname, $lastname, $username, $password);

      
        header('Location: ../home.php?signup=success');

        $pdo = null;
        $stmt = null;

        die();

    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}
else {
    header('Location: ../home.php');
    die();
}