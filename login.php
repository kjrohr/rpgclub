<?php
 session_start();
 require_once 'dbconfig.php';

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: dashboard.php");
  exit;
 }

 $error = false;

 if( isset($_POST['btn-login']) ) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];


  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }

  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {

   $password = hash('sha256', $pass); // password hashing using SHA256

   $res=mysql_query("SELECT userId, user_name, user_passw FROM users WHERE user_email='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

   echo $pass;
   echo "<br />";
   echo $row['password'];
   if( $count == 1 && $row['password']==$password ) {
    $_SESSION['user'] = $row['user_id'];
    header("Location: dashboard.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }

  }

 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relationship Repo! - Login</title>
</head>
<body>
  <h2>Sign In.</h2>


  <?php
   if ( isset($errMSG) ) {
      echo $errMSG;
    }
  ?>
  <form method="post">

  <input type="email" name="email" placeholder="Your Email" />
  <input type="password" name="pass" placeholder="Your Password"/>
  <button type="submit"  name="btn-login">Sign In</button>

    </form>


</body>
</html>
