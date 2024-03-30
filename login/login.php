<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
     require('db.php');
     session_start();
     // When form submitted, check and create user session.
     if (isset($_POST['username'])) {
         $username = stripslashes($_REQUEST['username']);    // removes backslashes
         $username = mysqli_real_escape_string($con, $username);
         $password = stripslashes($_REQUEST['password']);
         $password = mysqli_real_escape_string($con, $password);
         // Check user is exist in the database
         $query    = "SELECT * FROM `users` WHERE username='$username'
                      AND password='" . md5($password) . "'";
         $result = mysqli_query($con, $query) or die(mysql_error());
         $rows = mysqli_num_rows($result);
         if ($rows == 1) {
             $_SESSION['username'] = $username;
             // Redirect to user dashboard page
             header("Location: home.html");
         } else {
             echo "<div class='form'>
                   <h3>Incorrect Username/password.</h3><br/>
                   <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                   </div>";
         }
     } else {
 ?>
 <form method="post" name="login">
    <div class="form-container">
        <h1 class="form-title">Login</h1>
        <form action="#">
          <div class="main-user-info">
    <div class="user-input-box">
        <label for="username">Username</label>
        <input type="text"
                id="username"
                name="username"
                placeholder="Enter Username"/>
      </div>
      <div class="user-input-box">
        <label for="password">Password</label>
        <input type="password"
                id="password"
                name="password"
                placeholder="Password"/>
      </div>
      </div>
      <div class="form-submit-btn">
        <input type="submit" value="Login">
        <p class="change">Don't have Register ?<a href="registration.php">click here</a></p>
         </div>
        </form>
    </di
    v>
    <?php
     }
    ?>
</body>
</html>