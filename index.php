<?php
  // Connects to the database.
  include_once 'dbconfig.php';
  include 'nav.php';

  // If the submit-data button was pressed.
  if(isset($_POST['submit-data']))
  {
  // Gathers form data from POST.
  // str_replace removes spaces
  $first_name = str_replace(' ', '', $_POST['first_name']);
  $last_name = str_replace(' ', '', $_POST['last_name']);
  $email_address = str_replace(' ', '', $_POST['email_address']);
  $age = str_replace(' ', '', $_POST['age']);
  $gender = str_replace(' ', '', $_POST['gender']);
  $pass = str_replace(' ', '', $_POST['password']);
  $verify = str_replace(' ', '', $_POST['verify']);

  // Checking to see if variables are empty
  if (empty($first_name)) {
    // If $first_name is empty
    echo 'Please do not leave any fields blank.';
  }
  else {
    // If $first_name is not empty check $last name
    if (empty($last_name)) {
      // If $last_name is empty
      echo 'Please do not leave any fields blank.';
    }
    else {
      // If $last_name is not empty
      if (empty($email_address)) {
        // If $email_address is empty
        echo 'Please do not leave any fields blank.';
      }
      else {
        // If $email_address isn't empty
        if (empty($age)) {
          // If $age is empty
          echo 'Please do not leave any fields blank.';
        }
        else {
          // If $age is not empty
          if (empty($gender)) {
            // If $gender is empty
            echo 'Please do not leave any fields blank.';
          }
          else {
            // If $gender is not empty
            if (empty($pass)) {
              // If $pass is empty
              echo 'Please do not leave any fields blank.';
            }
            else {
              // If $pass is not empty
              if (empty($verify)) {
                // If $verify is empty
                echo 'Please do not leave any fields blank.';
              }
              else {
                // If everything was not empty
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
                    $random_number = rand(1000,9999);
                    $coupon = $email_address . $age . $random_number;
                    $coupon_used = false;
                    $password = password_hash($pass, PASSWORD_BCRYPT);
                    $sql_query = "INSERT INTO users(first_name,last_name,email_address,age,gender,password,coupon,coupon_used) VALUES('$first_name','$last_name','$email_address','$age','$gender','$password','$coupon','$coupon_used')";
                    mysql_query($sql_query);
                  }
                }
              }
            }
          }
        }
      }
    }
  }
} // End of isset($_POST['submit-data'])
?>

<title>RPG Club User Registration</title>
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
