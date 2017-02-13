<?php
 session_start();
 require_once 'dbconfig.php';

 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: dashboard.php");
  exit;
 }

if (isset($_POST['btn-login'])) {
  $email = $_POST['email'];
  $password = $_POST['pass'];

  $res=mysql_query("SELECT id, email_address, password FROM users WHERE email_address='$email'");
  $row=mysql_fetch_array($res);
  $count = mysql_num_rows($res);

  $verify = password_verify($password, $row['password']);

  if ($verify == true) {
    $_SESSION['user'] = $row['id'];
    header("Location: dashboard.php");
  }
  else {
    echo "Incorrect credentials";
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
