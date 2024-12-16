<?php
    require_once 'LoginPHP/config_session.php';
    require_once 'LoginPHP/signup_view.php';
    require_once 'LoginPHP/login_view.php';
    require_once 'fetch_leaderboard.php';
    require_once 'dbh.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heads Down Homepage</title>
    <title>Heads Down Homepage</title>
    <link rel="stylesheet" href="headsdown.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            text-align: center;
            font-family: Arial, sans-serif;
            background-image: url(./images/blue-bg.jpg);
            background-color: #84a2d4;
            background-repeat: no-repeat;
            background-size: cover;
            background-position-x: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        header {
            background-color: #0073e6;
            color: white;
            padding: 20px 0;
        }
        
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        
        main {
            padding: 20px;
        }
        
        #game-instructions {
            margin-bottom: 20px;
            padding: 10px;
            font-size: medium;
            text-align: justify;
            margin-right: 25vw;
            margin-left: 25vw;
        }
        
        #game-area {
            margin: 20px 0;
        }
        
        #word-display {
            background-color: #e6f7ff;
            border: 2px solid #0073e6;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        button {
            background-color: #0073e6;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }
        
        button:hover {
            background-color: #005bb5;
        }

        /* Popup container */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
        
        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 40vw;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }
        
        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
        
        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }
        
        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
        
        footer {
            background-color: #0073e6;
            color: white;
            padding: 10px 0;
            position: relative;
            margin-bottom: 0;
            width: 100%;
            margin-top: auto;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            text-align: center;
            font-family: Arial, sans-serif;
            background-image: url(./images/blue-bg.jpg);
            background-color: #84a2d4;
            background-repeat: no-repeat;
            background-size: cover;
            background-position-x: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        header {
            background-color: #0073e6;
            color: white;
            padding: 20px 0;
        }
        
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        
        main {
            padding: 20px;
        }
        
        #game-instructions {
            margin-bottom: 20px;
            padding: 10px;
            font-size: medium;
            text-align: justify;
            margin-right: 25vw;
            margin-left: 25vw;
        }
        
        #game-area {
            margin: 20px 0;
        }
        
        #word-display {
            background-color: #e6f7ff;
            border: 2px solid #0073e6;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        button {
            background-color: #0073e6;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }
        
        button:hover {
            background-color: #005bb5;
        }

        /* Popup container */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
        
        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 40vw;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }
        
        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
        
        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s
        }
        
        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        
        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
        
        footer {
            background-color: #0073e6;
            color: white;
            padding: 10px 0;
            position: relative;
            margin-bottom: 0;
            width: 100%;
            margin-top: auto;
        }

        table{
            margin-left:auto;
            margin-right:auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Heads Down</h1>
        <p>The Ultimate Guessing Game</p>

        <?php
            if (isset($_SESSION["user_id"])){

                echo '<form action="Loginphp/logout.php" method="post">';
                echo    '<button type="submit">Logout</button>';
                echo '</form>';
            }
            else{
                echo '<button class="btnLogin-popup">Login</button>';
            }
        ?>

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
                    check_login_errors();
                ?>
            </div>
        </div>

    </header>
    <main>
        <section id="game-instructions">
            <h2>How to Play</h2>
            <p>
                Hold the phone or card up to your forehead. Your teammates will give you clues to guess the word before time runs out!
                <br>
                Rules
                <ul>
                    <li>No Direct Answers</li>
                    <li>No Foreign Language</li>
                    <li>The game ends when timer runs out</li>
                </ul>
                The player with the highest score at the end of the game wins.
                <br>
                HAVE FUN!!
            </p>
        </section>
        
        <div class="container">
            <button id="showLeaderboard">Show Leaderboard</button>
                </tbody>
              </table>
          
            <div id="leaderboardPopup" style="display: absolute;">
              <h2>Leaderboard</h2>
              <table>
                <thead>
                    leaderboard
                
                </thead>
                <tbody id="leaderboardBody">
                    <?php
                       $lb_alltime = load_leaderboard_alltime($pdo);
                       $limited_results = array_slice($lb_alltime, 0, 5);

                       foreach ($limited_results as $index => $row) {
                           echo '<tr>';
                           echo '<th>' . ($index + 1) . '</th>';
                           echo '<th>' . htmlspecialchars($row['username']) . '</th>';
                           echo '<th>' . htmlspecialchars($row['score']) . '</th>';
                           echo '<th>' . htmlspecialchars($row['category']) . '</th>';
                           echo '</tr>';
                       }
                    ?>
                </tbody>
              </table>
              <table>
                <thead>
                    leaderboard personal            
                </thead>
                <tbody id="leaderboardBody">
                <?php
                    if (isset($_SESSION["user_id"])) {

                        $lb_personal = load_leaderboard_personal($_SESSION["user_id"], $pdo);
                        $limited_results = array_slice($lb_personal, 0, 5);

                       foreach ($limited_results as $index => $row) {
                           echo '<tr>';
                           echo '<th>' . ($index + 1) . '</th>';
                           echo '<th>' . htmlspecialchars($row['username']) . '</th>';
                           echo '<th>' . htmlspecialchars($row['score']) . '</th>';
                           echo '<th>' . htmlspecialchars($row['category']) . '</th>';
                           echo '</tr>';
                       }
                    } else {
                        echo "<p>No user ID found in the session.</p>";
                    }
                ?>
                </tbody>
                </table>
              <button id="closeLeaderboard">Close</button>
            </div>
        </div>

        <button id="settingPage" onclick="window.location.href='setting_page.php'">Next Page</button>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Heads Down</p>
    </footer>
    <script src="script-login.js"></script>
</body>
</html>
