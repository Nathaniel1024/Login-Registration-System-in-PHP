<?php
session_start();

// Redirect to login page if any required session variable is not set
if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_SESSION['hashedPassword'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="16.png" type="image/x-icon">
</head>
<body>
    <div class="welcome-container">
        <h1 class="welcome-header">Welcome Dashboard</h1>
        
        <div class="user-info">
            <p>
                <span class="info-label">Username:</span> 
                <?php echo htmlspecialchars($_SESSION['username']); ?>
            </p>

            <p>
                <span class="info-label">Password:</span> 
                <?php echo htmlspecialchars($_SESSION['password']); ?>
            </p>
            
            <div class="hash-section">
                <p>
                    <span class="info-label">Hashed Password:</span><br>
                    <?php echo htmlspecialchars($_SESSION['hashedPassword']); ?>
                </p>
            </div>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
