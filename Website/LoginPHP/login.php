<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        require_once 'dbh.php';
        require_once 'login_model.php';
        require_once 'login_contr.php';

        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if (!does_username_exist($result)) {
            $errors["login_incorrect"] = "Incorrect login info";
        }
        else if (!is_password_correct($password, $hashpass)){
            $errors["login_incorrect"] = "Incorrect login info";
        }
    }
    catch (PDOException $e) {
        die('Query failed: '. $e->getMessage());
    }

    require_once 'config_session.php';

    if ($errors) {
        $_SESSION['errors_signup'] = $errors;
        header("Location: ../home.php");
        die();
    }

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result['id'];
    session_id($sessionId);
}
else {
    header('Location: home.php');
    die();
}