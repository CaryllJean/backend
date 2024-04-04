<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ws310";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pass"];
    
    // Query the database to fetch user's hashed password
    $stmt = $conn->prepare("SELECT user_pass FROM user_tbl WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();
    
    // Verify password using password_verify function
    if (password_verify($password, $hashed_password)) {
        // User authenticated, redirect to dashboard
        $_SESSION["user_email"] = $email; 
        header("Location: welcome_page.php"); 
        exit(); 
    } else {
        // Invalid credentials, display error message
        echo "Invalid username or password. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Login Form</div>
      <form action="login.php" method="post">
        <div class="field">
          <input type="text" name="email" required /> 
          <label>Email Address</label>
        </div>
        <div class="field">
          <input type="password" name="pass" required /> 
          <label>Password</label>
        </div>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me" />
            <label for="remember-me">Remember me</label>
          </div>
          <div class="pass-link">
            <a href="forget.php">Forgot password?</a>
          </div>
        </div>
        <div class="field">
          <input type="submit" value="Login" />
        </div>
        <div class="signup-link">
          Not a member? <a href="registration.php">Signup now</a>
        </div>
      </form>
    </div>
  </body>
</html>
