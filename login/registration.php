<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $fullname = stripslashes($_REQUEST['fullName']);
        $fullname = mysqli_real_escape_string($con, $fullname);
        $fathername = stripslashes($_REQUEST['fathername']);
        $fathername = mysqli_real_escape_string($con, $fathername);
        $mothername = stripslashes($_REQUEST['mothername']);
        $mothername = mysqli_real_escape_string($con, $mothername);
        $address  = stripslashes($_REQUEST['address']);
        $address  = mysqli_real_escape_string($con, $address);
        $phonenumber  = stripslashes($_REQUEST['phoneNumber']);
        $phonenumber  = mysqli_real_escape_string($con, $phonenumber);
        $dob  = stripslashes($_REQUEST['dob']);
        $dob  = mysqli_real_escape_string($con, $dob);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['Password']);
        $password = mysqli_real_escape_string($con, $password);
        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($con, $gender);
        $courseName = stripslashes($_REQUEST['courseName']);
        $courseName = mysqli_real_escape_string($con, $courseName);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime,fullname,fathername,mothername,address,phoneNumber,dob,gender,courseName)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime','$fullname','$fathername','$mothername','$address','$phonenumber','$dob','$gender','$courseName')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="form-container">
      <h1 class="form-title">Registration</h1>
      <form action="" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Enter Full Name" required/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username" required/>
          </div>
          <div class="user-input-box">
            <label for="fathername">Father Name</label>
            <input type="text"
                    id="fathername"
                    name="fathername"
                    placeholder="Enter Fathername" required/>
          </div>
          <div class="user-input-box">
            <label for="mothername">Mother Name</label>
            <input type="text"
                    id="mothername"
                    name="mothername"
                    placeholder="Enter Mothername" required/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email" required/>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Enter Phone Number" required/>
          </div>
          <div class="user-input-box">
            <label for="address">Address</label>
            <input type="text"
                    id="address"
                    name="address"
                    placeholder="Enter Addressr" required/>
          </div>
          <div class="user-input-box">
            <label for="courseName">Course Name</label>
            <input type="text"
                    id="courseName"
                    name="courseName"
                    placeholder="Enter Course Name" required/>
          </div>
          <div class="user-input-box">
            <label for="dob.">DOB</label>
            <input type="text"
                    id="dob"
                    name="dob"
                    placeholder="Enter DOB." required/>
          </div>
          <div class="user-input-box">
            <label for="Password">Password</label>
            <input type="password"
                    id="Password"
                    name="Password"
                    placeholder="Password" required/>
          </div>
        </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other">
            <label for="other">Other</label>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register">
          <p class="change">Already Register ?<a href="login.php">click here</a></p>
        </div>
      </form>
    </div>
    <?php
    }
    ?>
  </body>
</html>