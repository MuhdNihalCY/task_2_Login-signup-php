<?php
session_start();
if (isset($_SESSION["username"])) { // already logged in, redirect to homepage  
    header("Location: index.php");
    exit();
}
include 'config/dbconnect.php'
?>
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
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = mysqli_real_escape_string($conn, $_POST['password']);

                            $sql = "SELECT * FROM Users WHERE Name = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();

                            if ($row) {
                                $hashedPassword = $row["Password"];
                                if (password_verify($password, $hashedPassword)) {
                                    $_SESSION["username"] = $username;
                                    header('Location: index.php');
                                    exit();
                                } else {
                                    echo "<span class='errorMsg'>Invalid login credentials.</span>";
                                }
                            } else {
                                echo "<span class='errorMsg'>User not found!</span>";
                            }
                            $stmt->close();
                            $conn->close();
                        }
                        ?>
                    </div>
                    <div class="loginInputContainer">
                        <input type="text" name="username" placeholder="User name" required>
                        <input type="password" name="password" id="pwd" placeholder="Password" required>
                        <input type="submit" value="Login">
                    </div>
                    <p class="haveAcc">Don't have an account? <a href="signup.php">SignUp here</a>.</p>
                </div>
            </div>
        </form>
    </main>
</body>
</html>