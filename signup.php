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
                <div class="signupContainer">
                    <h3>Sign Up</h3>
                    <div class="errorDiv">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $username = mysqli_real_escape_string($conn, $_POST['username']);
                            $password = mysqli_real_escape_string($conn, $_POST['password']);
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                            // Validate password
                            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,16}$/', $password)) {
                                echo "<span class='errorMsg'>Password must be between 8 and 16 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.</span>";
                            } else {
                                $stmt = $conn->prepare("SELECT Name FROM Users WHERE Name=?");
                                $stmt->bind_param("s", $username);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    // user name already exist
                                    echo " <span class='errorMsg'>User name already exists.</span>";
                                } else {
                                    // user name doesn't exist. Insert new user to database
                                    $sql = "INSERT INTO Users(Name, Password) VALUES (?, ?)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("ss", $username, $hashedPassword);
                                    $stmt->execute();
                                    if ($stmt->affected_rows > 0) {
                                        echo "<span>New Record created succesfully</span>";
                                        $_SESSION["username"] = $username;
                                        header('location: index.php');
                                        exit();
                                    } else {
                                        echo "<span class='errorMsg'>Database Error</span>";
                                    }
                                }
                                $stmt->close();
                                $conn->close();
                            }
                        }
                        ?>
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