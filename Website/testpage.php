<?php
require_once 'LoginPHP/config_session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heads Up Game</title>
    <link rel="stylesheet" href="headsdown.css">
</head>

<body>
<div class="form-box cat-creation">
            <h2>Register</h2>
            <form action="LoginPHP/signup.php" method='post'>
                <div class="input-box">
                    <input type="firstname" name='firstname' required> 
                    <label>First Name</label>
                </div>
                <div class="input-box">
                    <input type="lastname" name='lastname' required>
                    <label>Last Name</label>
                </div>
                <div class="input-box">
                    <input type="username" name='username' required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name='password' required>
                    <label>Password</label>
                </div>
                <button type="submit">Register</button>
                <div class="login-register">
                    <p>Have an account? <a href="#" class="login-link">Login Here</a></p>
                </div>
            </form>
</body>

</html>