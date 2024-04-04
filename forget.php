<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ws310";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    function generateRandomPassword($length = 8) {
      $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $password = '';
      for ($i = 0; $i < $length; $i++) {
          $password .= $chars[rand(0, strlen($chars) - 1)];
      }
      return $password;
  }
  
  $new_password = generateRandomPassword(8);
  echo $new_password;  

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE user_tbl SET user_pass = '$hashed_password' WHERE user_email = '$email'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Password reset successfully. New password: $new_password');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/registration.css" />
  </head>
  <body>
    <div class="wrapper">
      <h2>Forgot Password</h2>
      <form action="forget.php" method="post">
        <div class="input-box">
          <input type="email" placeholder="Enter your email" name="email" required />
        </div>
        <div class="input-box button">
          <input type="Submit" value="Reset Password" />
        </div>
        <div class="text">
          <h3>Already have an account? <a href="login.php">Login now</a></h3>
        </div>
      </form>
    </div>
  </body>
</html>
