<?php
  include_once('dbconfig.php');
  if(isset($_POST['submit-data']))
  {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $degree = $_POST['degree'];

  echo $firstname;
  echo $lastname;
  echo $email;
  echo $degree;

  $sql_query = "INSERT INTO members(first_name,last_name,email,degree_program) VALUES('$firstname','$lastname',$email','$degree')";
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
    <input type='text' name="firstname" placeholder='Web Design and Development' required />
    <input type='text' name="lastname" placeholder='Web Design and Development' required />
    <input type='text' name="email" placeholder='Web Design and Development' required />
    <input type='text' name="degree" placeholder='Web Design and Development' required />
    <button type='submit' name='submit-data'>Submit</button>
  </form>
</body>
</html>
