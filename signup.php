<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <main>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mainContainer">
                <div class="signupContainer">
                    <h3>Sign Up</h3>
                    <div class="errorDiv">
                    </div>
                    <div class="signupInputContainer">
                        <input type="text" name="username" placeholder="User name" required>
                        <input type="password" name="password" id="pwd" placeholder="Password" required>
                        <input type="submit" value="Submit">
                    </div>
                    <p class="haveAcc">Have an account? <a href="login.php">Login here</a>.</p>
                </div>
            </div>
        </form>
    </main>
</body>

</html>