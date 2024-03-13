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
                <div class="loginContainer">
                    <h3>Login</h3>
                    <div class="errorDiv">
                    </div>
                    <div class="loginInputContainer">
                        <input type="text" name="username" placeholder="User name" required>
                        <input type="password" name="password" id="pwd" placeholder="Password" required>
                        <input type="submit" value="Login">
                    </div>
                    <p class="haveAcc">Don't have an account? <a href="signup.php">Signup here</a>.</p>
                </div>
            </div>
        </form>
    </main>
</body>

</html>