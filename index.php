<?php
  include_once('dbconfig.php')
  if(isset($_POST['submit-data']))
  {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $degree = $_POST['degree'];

  $sql_query = "INSERT INTO members(first_name,last_name,email,degree_program) VALUES('$first_name','$last_name',$email','$degree')";
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
    <input type='text' name='firstname' placeholder='First Name' required />
    <input type='text' name='lastname' placeholder='Last Name' required />
    <input type='text' name='email' placeholder='example@gmail.com' required />
    <input type='text' name='degree' placeholder='Web Design and Development' required />
    <button type='submit' name='submit-data'>Submit</button>
  </form>
</body>
</html>
