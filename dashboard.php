<?php
 session_start();
 require_once 'dbconfig.php';

 $unused = "The code is not used, please give the customer a 10% discount.";

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);


 if(isset($_POST['submit-code'])) {
    $coupon_code = str_replace(' ', '', $_POST['coupon_code']);

    $res=mysql_query("SELECT * FROM users WHERE coupon='$coupon_code'");
    $row=mysql_fetch_array($res);
    $count = mysql_num_rows($res);

    if ($count == 0) {
      // Code does not exist.
      $message = "Please try again, we could not find the code.";
    }
    else {
      // Code does exist.
      if ($row['coupon_used'] == 1) {
        // Code is used.
        $message = "The code is used.";
      }
      else {
        // Code is not used.
        $message = $unused;
      }
    }
 }


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['first_name']; ?></title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
Hello <?php echo $userRow['first_name']; ?>
<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>

<?php
  if ($userRow['user_permissions'] == 'user') {
    // User display
    echo 'user';
  }
  else {
    // Admin display
    ?>
    <form method="post">
      <label>Coupon Code Look Up:<input type="text" name="coupon_code" placeholder="catoverlord@gmail.com265434" /></label>
      <button type='submit' name='submit-code'>Submit</button>
    </form>
    <br />
    <span><?php echo $message ?></span>
    <?php
    }
  }
?>


</body>
</html>
