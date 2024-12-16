<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catname = $_POST['catname'];
    $catwords = $_POST['catwords'];
    $user_id = $_POST['user_id'];

    try {
        require_once '../dbh.php';
        require_once 'cat_create_model.php';
        require_once 'cat_create_contr.php';

        $errors = [];
        if (is_input_empty($catname, $catwords)) {
            $errors["empty_input"] = "Fill in all fields!";
            error_log("Error 1");
        }
        if(does_cat_exist($pdo, $catname)){
            $errors["cat_exists"] = "This Category Already Exists";
            error_log("Error 2");
        }
        if(!is_catwords_valid($catwords)){
            $errors["cat_invalid"] = "Your words have invalid characters";
            error_log("Error 3");
        }

        if ($errors) {
            $_SESSION['errors_cat_creation'] = $errors;
            header("Location: ../setting_page.php");
            die();
        }

        $catwords_nospaces = str_replace(' ', '', $catwords);

        error_log("Before Cat Create Function");

        create_cat($pdo, $catname, $catwords_nospaces, $user_id);
      
        header('Location: ../setting_page.php?cat-creation=success');

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