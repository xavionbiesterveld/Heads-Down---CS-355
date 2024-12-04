<?php
require_once 'LoginPHP/config_session.php';
require_once 'CategoryPHP/cat_create_view.php';
$_SESSION["user_id"] = 1;

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

    <button class="btncategorycreation-popup">Create Class</button>

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
                        <textarea name='catwords' class='cat-textarea' required>
                        </textarea>
                        <label>Enter Comma Separated List of Words Here</label>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit">Create Category</button>
                </form>
        </div>

        
    </div>

    <?php
        check_cat_creation_errors();
    ?>

    <script src="script.js"></script>

</body>

</html>