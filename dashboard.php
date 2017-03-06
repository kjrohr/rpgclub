<?php
 session_start();
 require_once 'dbconfig.php';

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
   $res=mysql_query("SELECT coupon,coupon_used FROM users WHERE coupon=".$coupon_code);
   $couponRow=mysql_fetch_array($res);
   echo $couponRow;
  //  if ($couponRow['coupon'] != $coupon_code) {
  //    // Code does not exist
  //    echo 'Please try again, we could not find the code.';
  //  }
  //  else {
  //    // Code exists
  //    if ($couponRow['coupon_used'] == 1) {
  //      // Code is used
  //      echo 'Coupon is used';
  //    }
  //    else {
  //      // Code is not used
  //      echo 'Coupon is not used, give them a 10% discount';
  //    }
  //  }
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
    <?php
  }
?>


</body>
</html>
