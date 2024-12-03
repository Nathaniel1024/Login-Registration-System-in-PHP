<?php
    require("php/database.php");
    session_start();
?>

<?php
    $msg = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS));
        $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS));

        if(isset($_POST["register"])){
            $sql = "SELECT password FROM users WHERE username = '$username'";
            try {
                $result = mysqli_query($conn, $sql);
            } catch (\Throwable $th) {
                
            }
            if(mysqli_num_rows($result) > 0){
                $msg = "User already exist!";
            } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
            try {
                $result = mysqli_query($conn, $sql);
                $msg = "User has been registered!";
            } catch (mysqli_sql_exception) {
                $msg = "User has NOT been Registered!";
            }
            }
        }

        if(isset($_POST["login"])){
            $sql = "SELECT password FROM users WHERE username = '$username'";
            try {
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $hashedPassword = $row["password"];
                    if (password_verify($password, $hashedPassword)){
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        $_SESSION['hashedPassword'] = $hashedPassword;
                        header("Location: php/home.php");
                        exit();
                    }
                    else{
                        $msg = "Incorrect Password";
                    }
                }
                else{
                    $msg = "User does not exist!";
                }
            } catch (\Throwable $th) {
                $msg = "User not found";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="16.png" type="image/x-icon">
</head>

<body>
    <div class="login-container">
        <h1 class="login-header">Login <br>& Registration</h1>

        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="form-group">
                <p style="text-align: center;"><?php echo htmlspecialchars($msg); ?></p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-actions">
                <input type="submit" name="login" value="Login" class="btn login-btn">
                <input type="submit" name="register" value="Register" class="btn register-btn">
            </div>
        </form>
        <p></p>
    </div>

</body>

</html>