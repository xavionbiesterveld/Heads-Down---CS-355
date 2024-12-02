<?php

declare(strict_types=1);

function check_cat_creation_errors() {
    if (isset($_SESSION['errors_cat_creation'])){
        $errors = $_SESSION['errors_cat_creation'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="form-error">' .$error . '</p>';
        }

        unset($_SESSION['errors_cat_creation']);
    }
    else if (isset($_GET["cat-creation"]) && $_GET["cat-creation"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Signup success!</p>';
    }
}