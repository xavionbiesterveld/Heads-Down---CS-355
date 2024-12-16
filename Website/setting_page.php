<?php
    require_once 'LoginPHP/config_session.php';
    require_once 'cat_load.php';
    require_once 'CategoryPHP/cat_create_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heads Down Setting Page</title>
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

        h1 {
            margin-top: 3vh;
            margin-bottom: 3vh;
            font-size: large;
        }

        section {
            padding: 10px;
        }
        
        button {
            background-color: #0073e6;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px;
        }
        
        button:hover {
            background-color: #005bb5;
        }
        
        footer {
            background-color: #0073e6;
            color: white;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
        }        
    </style>
</head>
<body>
    <header>
        <h1>Heads Down</h1>
        <p>The Ultimate Guessing Game</p>
        <?php
            if (isset($_SESSION["user_id"])){
                echo    '<button class="btncategorycreation-popup">Create Class</button>';
            }
        ?>

        <div class="wrapper">
                <span class="close-window" >
                    x
                </span>
                <div class="form-box cat-creation">
                        <h2>Create Category</h2>
                        <form action="CategoryPHP/cat_create.php" method='post'>
                            <div class="input-box">
                                <input type="catname" name='catname' required> 
                                <label>Category Name</label>
                            </div>
                            <div class="input-box-textarea">
                                <textarea name='catwords' class='cat-textarea' required></textarea>
                                <label>Enter Comma Separated List of Words Here</label>
                            </div>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <button type="submit">Create Category</button>
                        </form>
                </div>
            </div>        
    </header>
        
    <?php check_cat_creation_errors() ?>
    
    <h1>Heads Down Settings</h1>

    <section>
        <label for="numPlayers">Number of Players:</label>
        <input type="number" id="numPlayers" min="2" max="10">
    </section>

    <section>
        <label for="timeLimit">Time Limit (seconds):</label>
        <select type="number" id="timeLimit">
            <option value="30">30</option>
            <option value="45">45</option>
            <option value="60">60</option>
            <option value="90">90</option>
        </select>
    </section>

    <section>
        <label for="category">Category:</label>
        <div class="category-checkbox">
                <?php
                    $names = load_category_names();
    
                    foreach ($names as $name) {
                        echo '<input type="checkbox" name="category[]" value="'.htmlspecialchars($name['cat_id']).' ">';
                        echo '<label>' .htmlspecialchars($name['cat_name']). '</label>';
                    }
                ?>
        </div>
    </section>

    <section>
        <button id="home" onclick="window.location.href='home.html'">Go Back</button>
        <button id="startGame" onclick="window.location.href='play_game.html'">Start Game</button>
    </section>

    <footer>
        <p>&copy; 2024 Heads Down</p>
    </footer>
    <script src="script.js"></script>
    <script src="script-login.js"></script>
</body>
</html>