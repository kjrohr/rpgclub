<?php
  // Connects to the database.
  include_once 'dbconfig.php';
  include 'nav.php';

  // If the submit-data button was pressed.
  if(isset($_POST['submit-data']))
  {
  // Gathers form data from POST.
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email_address = $_POST['email_address'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $pass = $_POST['password'];
  $verify = $_POST['verify'];

  // Compares $pass and $verify if they are equal then go ahead and start next check
  if (strcmp($pass,$verify) !== 0) {
    // $pass and $verify were not equal, give feedback to user.
    echo 'Both fields for password are not the same. Please try again.';
  }
  else {
    // $pass and $verify were equal now check database to see if the email is already in use.
    $res=mysql_query("SELECT * FROM users WHERE email_address='$email_address'");
    $row=mysql_fetch_array($res);
    $count = mysql_num_rows($res);

    if ($count != 0) {
      // The email is already in use.
      echo 'That email is already in use please register a unique email address.';
    }
    else {
      // The email is not already in use.
      $password = password_hash($pass, PASSWORD_BCRYPT);
      $sql_query = "INSERT INTO users(first_name,last_name,email_address,age,gender,password) VALUES('$first_name','$last_name','$email_address','$age','$gender','$password')";
      mysql_query($sql_query);
    }
  }
}
?>

<html>
<head>
<title>RPG Club User Registration</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<h1>RPG Club User Registration</h1>
  <form method='post'>
    <input type='text' name="first_name" placeholder='First Name' required />
    <input type='text' name="last_name" placeholder='Last Name' required />
    <input type='text' name="email_address" placeholder='Email' required />
    <input type='text' name="age" placeholder='age' required />
    <input type='radio' name='gender' value='m'>Male<br />
    <input type='radio' name='gender' value='f'>Female<br />
    <input type='password' name='password' placeholder='Password' required />
    <input type='password' name='verify' placeholder='Verify Password' required />
    <button type='submit' name='submit-data'>Submit</button>
  </form>
</body>
</html>
