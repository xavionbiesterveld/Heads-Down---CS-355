<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    error_log("This is a log message");

    try {
        require_once '../dbh.php';
        require_once 'login_model.php';
        require_once 'login_contr.php';

        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        

        $result1 = does_username_exist($result);
        error_log("Username existence check: " . ($result1 ? 'true' : 'false'));

        $result2 = is_password_correct($password, $result);
        error_log("Password existence check: " . ($result2 ? 'true' : 'false'));




        if (!does_username_exist($result)) {
            $errors["login_incorrect"] = "Incorrect login info";
        }
       
        if (!is_password_correct($password, $result)){
            $errors["login_incorrect"] = "Incorrect login info";
        }
       

        require_once 'config_session.php';

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;
            header("Location: ../home-copy.php");
            die();
        }

        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["username"] = htmlspecialchars($result["username"]);
    
        $_SESSION['last_regeneration'] = time();
    
        header('Location: ../home-copy.php?login=success');
    
        $pdo = null;
        $stmt = null;
    
        die();
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }
}
else {
    header('Location: home.php');
    die();
}