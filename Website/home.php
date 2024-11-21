<?php
require_once 'LoginPHP/config_session.php';
require_once 'LoginPHP/signup_view.php';
require_once 'LoginPHP/login_view.php';
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
    <header>
        <h1>Heads Up!</h1>
        <p>The Ultimate Guessing Game</p>
        <button class="btnLogin-popup">Login</button>

        <?php
            if (isset($_SESSION["user_id"])){ ?>

                <form action="Loginphp/logout.php" method="post">
                    <input type="hidden" name="some_data" value="value">
                    <button type="submit">Logout</button>
                </form>
            
        <?php } ?>
    </header>

    <div class="wrapper">
        <span class="close-window" >
            x
        </span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="LoginPHP/login.php" method='post'>
                <div class="input-box">
                    <input type="username" name='username' required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name='password' required>
                    <label>Password</label>
                </div>
                <button type="submit">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register Here</a></p>
                </div>
            </form>
            <?php
                check_login_errors()
            ?>
        </div>

        <div class="form-box register">
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

           
        </div>
    </div>

<?php
    check_signup_errors();
?>

    <main>
        <section id="game-instructions">
            <h2>How to Play</h2>
            <p>Hold the phone or card up to your forehead. Your teammates will give you clues to guess the word before time runs out!</p>
        </section>
        <section id="game-area">
            <h2>Game Area</h2>
            <div id="word-display">
                <p>Press Start to see your word!</p>
            </div>
            <button id="start-button">Start Game</button>
        </section>
    </main>

    

    <footer>
        <p>&copy; 2024 Heads Up!</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
