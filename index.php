<?php
  include_once 'dbconfig.php';
  if(isset($_POST['submit-data']))
  {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $degree_program = $_POST['degree_program'];

  $sql_query = "INSERT INTO members(first_name,last_name,email,degree_program) VALUES('$first_name','$last_name','$email','$degree_program')";
mysql_query($sql_query);

  // sql query for inserting data into database

}
?>

<html>
<head>
<title>RPG Club User Registration</title>
</head>
<body>

  <form method='post'>
    <input type='text' name="first_name" placeholder='First Name' required />
    <input type='text' name="last_name" placeholder='Last Name' required />
    <input type='text' name="email" placeholder='Email' required />
    <input type='text' name="degree_program" placeholder='Degree Program' required />
    <button type='submit' name='submit-data'>Submit</button>
  </form>
</body>
</html>
